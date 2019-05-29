<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;
use Validator;

use App\FK;
use App\FU;
use App\FL;
use App\FR;
use App\JenisListrik;
use App\JenisHunian;
use App\FKM;
use App\Parkir;
use App\kost_fk;
use App\kost_fkm;
use App\kost_fl;
use App\kost_fu;
use App\kost_parkir;
use App\Kost;
use App\Foto;
use App\User;

class KostController extends Controller
{

  public function update($id)
  {
    $datas = Kost::where('id', "=", $id)->first();
    $fk = FK::all();
    $fu = FU::all();
    $fl = FL::all();
    $fr = FR::all();
    $fkm = FKM::all();
    $jlistrik = JenisListrik::all();
    $jhunian  = JenisHunian::all();
    $parkir = Parkir::all();
    return view('admin.kost.edit', [
        'kosts' => $datas,
        'fks' => $fk,
        'fus' => $fu,
        'fls' => $fl,
        'frs' => $fr,
        'fkms' => $fkm,
        'jls' => $jlistrik,
        'hunian' => $jhunian,
        'parkirs' => $parkir,
    ]);
  }


    public function index() {
        $user   =   User::all();
        $datas = Kost::orderBy('id', 'DESC')->get();
        return view('admin.kost.index')->with([
            'kosts' => $datas,
            'users' => $user,
        ]);
    }

    public function create()
    {
      $fk = FK::all();
      $fu = FU::all();
      $fl = FL::all();
      $fr = FR::all();
      $fkm = FKM::all();
      $jlistrik = JenisListrik::all();
      $jhunian  = JenisHunian::all();
      $parkir = Parkir::all();
      $fasilitas          = Fasilitas::all();
      $fasilitasKategori  = FasilitasKategori::all();
      return view('admin.kost.tambah')->with([
          'fks'               => $fk,
          'fus'               => $fu,
          'fls'               => $fl,
          'frs'               => $fr,
          'fkms'              => $fkm,
          'hunian'            => $jhunian,
          'jls'               => $jlistrik,
          'fasilitas'         => $fasilitas,
          'fasilitasKategori' => $fasilitasKategori,
          'parkirs'           => $parkir,
      ]);
    }

    public function thumbnail($x) {
        $path = pathinfo($x);
        return $path['dirname']."/".$path['filename']."-400.".$path['extension'];
    }

    public function getFoto($idKost){
        $foto = Foto::where('id_kost', '=', $idKost)->get();
        $result = array();
        foreach($foto as $data) {
            $obj['id'] = $data->id;
            $obj['url'] = $data->url;
            $obj['thumb'] = $this->thumbnail($data->url);
            $obj['size'] = File::size('storage/' . $data->url);
            $result[] = $obj;
        }
        header('Content-type: text/json');              //3
        header('Content-type: application/json');
        return Response::json($result);
        return 0;
    }

    public function tambahFoto(){
        $input = Input::all();
        $rules = array('file' => 'image|max:3000');
        $validation = Validator::make($input, $rules);
        if ($validation->fails()) return Response::make($validation->errors()->first(), 400);

        $file = Input::file('file');
        $direktori  = "image-kost/" . date("Y/m/");
        $storage  = "temp/" . $direktori;
        if(!File::exists($storage)) mkdir($storage, 0755, true);

        $filename  = $direktori . sha1(time() . time()) . "." . $file->getClientOriginalExtension();
        $filepath  = 'temp/' . $filename;
        $path = public_path($filepath);
        if(Image::make($file->getRealPath())->save($path)) {
            $filepath400  = 'temp/' . $this->thumbnail($filename);
            $path400      = public_path($filepath400);
            Image::make($file->getRealPath())->fit(400)->save($path400);
            return Response::json([
                'nama' => $filename,
                'nama_ori' => $file->getClientOriginalName(),
            ]);
        }
        else return Response::json('error', 400);
    }

    public function hapusFoto(Request $request)
    {
        if($request->ajax()) {
            if(File::exists("temp/" . $request->nama)) {
                if(File::delete("temp/" . $request->nama) &&
                File::delete($this->thumbnail("temp/" . $request->nama))) {
                    return with(['success' => 1]);
                }
                return with(['success' => 0, 'message' => "Gagal Dihapus"]);
            }
            return with(['success' => 0, 'message' => "File Tidak Ada"]);
        }
    }

    public function seo_title($s) {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }

    public function rule() {
        return [
            'namaPemilik'     => 'required',
            'telpPemilik'     => 'required|numeric|min:6',
            'namaKost'        => 'required',
            'alamatKost'      => 'required',
            // 'jenisHunian'     => 'required',
            'posKost'         => 'numeric|digits:5',
            'telpKost'        => 'numeric|min:6',
            'luasKamar'       => 'required',
            'jumlahKamar'     => 'required|numeric',
            'penghuni'        => 'required',
            // 'sewaMin'         => 'required|numeric',
            'sewaHari'        => 'numeric',
            'sewaMinggu'      => 'numeric',
            'sewaBulan'       => 'numeric',
            'sewaTahun'       => 'numeric',
        ];
    }

    public function tambah(Request $input) {
        $this->validate($input, $this->rule());
        $penghuni = "";
        switch ($input->penghuni) {
            case 'p':
            $penghuni = "Putra";
            break;
            case 'w':
            $penghuni = "Putri";
            break;
            case 'c':
            $penghuni = "Campur";
            break;
            default:
            $penghuni = "Putra";
            break;
        }

        $kost = new Kost;
        $seoTitle = $this->seo_title($input->namaKost);
        $x = 1;
        do {
            $data = Kost::where('seoTitle', '=', $seoTitle)->get()->count();
            if($data>0) {
                $seoTitle = $this->seo_title($input->namaKost)."-".$x;
            }
            $x++;
        }
        while($data!=0);

        // id_jenis_hunian , id_jenis_listrik

        $kost->user_id         = null;
        $kost->seoTitle        = $seoTitle;
        $kost->namaPemilik     = $input->namaPemilik;
        $kost->telpPemilik     = $input->telpPemilik;
        $kost->alamatPemilik   = $input->alamatPemilik;
        $kost->namaKost        = $input->namaKost;
        $kost->id_jenis_hunian = $input->id_jenis_hunian;
        $kost->alamatKost      = $input->alamatKost;

        if ($input->posKost == null){
            $kost->posKost      = null;
        } else {
            $kost->posKost      = $input->posKost;
        }

        $kost->telpKost        = $input->telpKost;
        $kost->luasKamar       = $input->luasKamar;
        $kost->jumlahKamar     = $input->jumlahKamar;

        if ( $input->id_jenis_hunian == 1 ){            
            $kost->kamarKosong    = $input->kamarKosong;
        } else {
            $kost->kamarKosong    = $input->jumlahKamar;            
        }

        $kost->id_jenis_listrik = $input->id_jenis_listrik;
        $kost->penghuni         = $penghuni;
        $kost->latitude         = $input->latitude;
        $kost->longitude        = $input->longitude;
        // $kost->sewaMin       = $input->sewaMin;
        $kost->sewaHari         = $input->sewaHari;
        $kost->sewaMinggu       = $input->sewaMinggu;
        $kost->sewaBulan        = $input->sewaBulan;
        $kost->sewaTahun        = $input->sewaTahun;
        $kost->fKhusus          = $input->fKhususLain;
        $kost->fUmum            = $input->fUmumLain;
        $kost->fLingkungan      = $input->fLingkunganLain;
        $kost->fKamarMandi      = $input->fMandiLain;
        $kost->catatan          = $input->catatan;
        $kost->konfirmasi       = 0;
        if(!$kost->save()) {
            return redirect()->back()->with('fail', 'Gagal Menambah Kost');
        }

        /*Menghubungkan Table Parkir dengan Kost
        * Mengambil data Parkir terlebih dahulu menggunakan ID Parkir
        * Setelah itu menghubungkannya dengan Kost yang di ambil dari ID Kost yang baru dibuat
        */
        //PARKIR
        if(count($input->parkir)>0) {
            foreach($input->parkir as $id_parkir) {
                $parkir = Parkir::find($id_parkir);
                if(count($parkir)<=0)
                return redirect()->back()->with('fail', 'Ada Kesalahan Saat Mengecek Data Parkir');
                $parkir->kostParkir()->attach($kost->id);
                if(!$parkir->save()) {
                    return redirect()->back()->with('fail', 'Ada Kesalahan Saat Memasukkan Data Parkir');
                }
            }
        }
        //FASILITAS KHUSUS
        if(count($input->fKhusus)>0) {
            foreach($input->fKhusus as $id) {
                $data = FK::find($id);
                if(count($data)<=0)
                return redirect()->back()->with('fail', 'Ada Kesalahan Saat Mengecek Data Fasilitas Khusus');
                $data->kostFK()->attach($kost->id);
                if(!$data->save()) {
                    return redirect()->back()->with('fail', 'Ada Kesalahan Saat Memasukkan Data Fasilitas Khusus');
                }
                $data->save();
            }
        }
        //FASILITAS KAMAR MANDI
        if(count($input->fKamarMandi)>0) {
            foreach($input->fKamarMandi as $id) {
                $data = FKM::find($id);
                if(count($data)<=0)
                return redirect()->back()->with('fail', 'Ada Kesalahan Saat Mengecek Data Fasilitas Kamar Mandi');
                $data->kostFKM()->attach($kost->id);
                if(!$data->save()) {
                    return redirect()->back()->with('fail', 'Ada Kesalahan Saat Memasukkan Data Fasilitas Kamar Mandi');
                }
                $data->save();
            }
        }
        //FASILITAS LINGKUNGAN
        if(count($input->fLingkungan)>0) {
            foreach($input->fLingkungan as $id) {
                $data = FL::find($id);
                if(count($data)<=0)
                return redirect()->back()->with('fail', 'Ada Kesalahan Saat Mengecek Data Fasilitas Lingkungan');
                $data->kostFL()->attach($kost->id);
                if(!$data->save()) {
                    return redirect()->back()->with('fail', 'Ada Kesalahan Saat Memasukkan Data Fasilitas Lingkungan');
                }
                $data->save();
            }
        }
        //FASILITAS UMUM
        if(count($input->fUmum)>0) {
            foreach($input->fUmum as $id) {
                $data = FU::find($id);
                if(count($data)<=0)
                return redirect()->back()->with('fail', 'Ada Kesalahan Saat Mengecek Data Fasilitas Umum');
                $data->kostFU()->attach($kost->id);
                if(!$data->save()) {
                    return redirect()->back()->with('fail', 'Ada Kesalahan Saat Memasukkan Data Fasilitas Umum');
                }
                $data->save();
            }
        }

        //IMAGE UPLOAD
        $jumPhoto = count($input->img);
        if($jumPhoto>5) $jumPhoto = 5;
        if(($jumPhoto>0)) {
            for ($i=0; $i < $jumPhoto; $i++) {
                $img = $input->img[$i];
                $ex = explode("/", $img);
                $dir = implode("/", array($ex[0], $ex[1], $ex[2])); //image-kost/tahun/bulan
                if(File::exists("temp/" . $img)) {
                    if(!File::exists("storage/" . $dir)) mkdir("storage/" . $dir, 0755, true);
                    if(File::copy("temp/" . $img, "storage/" . $img)
                    && File::delete("temp/" . $img)
                    && File::copy("temp/" . $this->thumbnail($img), "storage/" . $this->thumbnail($img))
                    && File::delete("temp/" . $this->thumbnail($img))) {
                        $foto = new Foto;
                        $foto->url = $img;
                        $foto->id_kost = $kost->id;
                        if(!$foto->save()) {
                            return redirect()->back()->with('fail', 'Ada Kesalahan Saat Memasukkan Data Foto');
                        }
                    }
                }
            }
        }
        return redirect()->route('admin.kost')->with([
            'message_success' => 'Data Telah di tambah...'
        ]);
    }

    // Update Pemilik
    public function updatePemilik(Request $input, $id) {
        $rule = array(
            'namaPemilik'     => 'required',
            'telpPemilik'     => 'required|numeric|min:6',
        );
        $valid = Validator::make(Input::all(), $rule);
        if ($valid->fails())
        return response()->json(array('errors' => $valid->getMessageBag()->toArray()));

        $kost = Kost::find($id);
        $kost->namaPemilik    = $input->namaPemilik;
        $kost->telpPemilik    = $input->telpPemilik;
        $kost->alamatPemilik  = $input->alamatPemilik;
        if($kost->save())
        if($input->ajax())
        return response()->json($kost);
        return redirect()->back()->with([
                'message_pemilik'      => 'Pemilik/Pengelola Kost dengan id ' . $id . ' Telah berhasil di Perbarui...'
            ]);
    }

    // update info kost
    public function updateKost(Request $input, $id) {

        $penghuniKost = "";
        switch ($input->penghuniKost) {
            case 'p':
            $penghuniKost = "Putra";
            break;
            case 'w':
            $penghuniKost = "Putri";
            break;
            case 'c':
            $penghuniKost = "Campur";
            break;
            default:
            $penghuniKost = "Putra";
            break;
        }

        $rule = array(
            'namaKost'        => 'required',
            'telpKost'        => 'numeric|min:6',
            'alamatKost'      => 'required',
            'kodePos'         => 'numeric|digits:5',
            'luasKamar'       => 'required',
            // 'kamarKosong'     => 'required',
            'jumlahKamar'     => 'required|numeric',
        );
        $valid = Validator::make(Input::all(), $rule);
        if ($valid->fails())
        return response()->json(array('errors' => $valid->getMessageBag()->toArray()));

        $kost = Kost::find($id);
        $kost->id_jenis_hunian  = $input->id_jenis_hunian;
        $kost->namaKost         = $input->namaKost;
        $kost->telpKost         = $input->telpKost;
        $kost->alamatKost       = $input->alamatKost;

        if ($input->kodePos == null){
            $kost->posKost      = null;
        } else {
            $kost->posKost      = $input->kodePos;            
        }

        $kost->luasKamar        = $input->luasKamar;
        $kost->jumlahKamar      = $input->jumlahKamar;

        if ( $input->id_jenis_hunian == 1 ){            
            $kost->kamarKosong  = $input->kamarKosong;
        } else {
            $kost->kamarKosong  = $input->jumlahKamar;
        }

        $kost->id_jenis_listrik = $input->id_jenis_listrik;
        $kost->penghuni         = $penghuniKost;
        $kost->latitude         = $input->latitude;
        $kost->longitude        = $input->longitude;
        if($kost->save())
        if($input->ajax())
        return response()->json($kost);
        return redirect()->back()->with([
            'message_kost'    => 'Informasi Kost dengan id ' . $id . ' Telah di Perbarui '
            ]);
    }

    // Update Sewa
        public function updateSewa(Request $input, $id) {
        $rule = array(
            // 'sewaMin'         => 'required|numeric',
            'sewaHari'        => 'numeric',
            'sewaMinggu'      => 'numeric',
            'sewaBulan'       => 'numeric',
            'sewaTahun'       => 'required|numeric',
        );
        $valid = Validator::make(Input::all(), $rule);
        if ($valid->fails())
        return response()->json(array('errors' => $valid->getMessageBag()->toArray()));

        $kost = Kost::find($id);
        // $kost->sewaMin      = $input->sewaMin;
        $kost->sewaHari     = $input->sewaHari;
        $kost->sewaMinggu   = $input->sewaMinggu;
        $kost->sewaBulan    = $input->sewaBulan;
        $kost->sewaTahun    = $input->sewaTahun;
        if($kost->save())
        if($input->ajax())
        return response()->json($kost);
        return redirect()->back()->with([
            'message_sewa'      => 'Harga Sewa dengan id ' . $id . ' telah di Perbarui '
            ]);
    }

    // Update Fasilitas
    public function updateFasilitas(Request $input, $id) {
        $kost = Kost::find($id);
        $kost->fKhusus        = $input->fKhususLain;
        $kost->fUmum          = $input->fUmumLain;
        $kost->fLingkungan    = $input->fLingkunganLain;
        $kost->fKamarMandi    = $input->fMandiLain;
        $kost->catatan        = $input->catatan;
        if($kost->save()){
            /*Menghubungkan Table Parkir dengan Kost
            * Mengambil data Parkir terlebih dahulu menggunakan ID Parkir
            * Setelah itu menghubungkannya dengan Kost yang di ambil dari ID Kost yang baru dibuat
            */
            //PARKIR
            $kostParkir = kost_parkir::where('id_kost', '=', $id)->delete();
            if(count($input->parkir)>0) {
                foreach($input->parkir as $id_parkir) {
                    $parkir = Parkir::find($id_parkir);
                    if(count($parkir)<=0)
                    return response()->json('errors', 'Ada Kesalahan Saat Mengecek Data Parkir');
                    $kostParkirs = kost_parkir::where('id_kost', '=', $id)->where('id_parkir', '=', $id_parkir);
                    if($kostParkirs->count() > 0)
                    $kostParkirs->delete();
                    $parkir->kostParkir()->attach($kost->id);
                    if(!$parkir->save()) {
                        return response()->json('errors', 'Ada Kesalahan Saat Memasukkan Data Parkir');
                    }
                }
            }
            //FASILITAS KHUSUS
            $kostFK = kost_fk::where('id_kost', '=', $id)->delete();
            if(count($input->fKhusus)>0) {
                foreach($input->fKhusus as $id_fk) {
                    $data = FK::find($id_fk);
                    if(count($data)<=0)
                    return response()->json('errors', 'Ada Kesalahan Saat Mengecek Data Fasilitas Khusus');
                    $kostFKs = kost_fk::where('id_kost', '=', $id)->where('id_fk', '=', $id_fk);
                    if($kostFKs->count() > 0)
                    $kostFKs->delete();
                    $data->kostFK()->attach($kost->id);
                    if(!$data->save()) {
                        return response()->json('errors', 'Ada Kesalahan Saat Memasukkan Data Fasilitas Khusus');
                    }
                    $data->save();
                }
            }
            //FASILITAS KAMAR MANDI
            $kostFKM = kost_fkm::where('id_kost', '=', $id)->delete();
            if(count($input->fKamarMandi)>0) {
                foreach($input->fKamarMandi as $id_fkm) {
                    $data = FKM::find($id_fkm);
                    if(count($data)<=0)
                    return response()->json('errors', 'Ada Kesalahan Saat Mengecek Data Fasilitas Kamar Mandi');
                    $kostFKMs = kost_fkm::where('id_kost', '=', $id)->where('id_fkm', '=', $id_fkm);
                    if($kostFKMs->count() > 0)
                    $kostFKMs->delete();
                    $data->kostFKM()->attach($kost->id);
                    if(!$data->save()) {
                        return response()->json('errors', 'Ada Kesalahan Saat Memasukkan Data Fasilitas Kamar Mandi');
                    }
                    $data->save();
                }
            }
            //FASILITAS LINGKUNGAN
            $kostFL = kost_fl::where('id_kost', '=', $id)->delete();
            if(count($input->fLingkungan)>0) {
                foreach($input->fLingkungan as $id_fl) {
                    $data = FL::find($id_fl);
                    if(count($data)<=0)
                    return response()->json('errors', 'Ada Kesalahan Saat Mengecek Data Fasilitas Lingkungan');
                    $kostFLs = kost_fl::where('id_kost', '=', $id)->where('id_fl', '=', $id_fl);
                    if($kostFLs->count() > 0)
                    $kostFLs->delete();
                    $data->kostFL()->attach($kost->id);
                    if(!$data->save()) {
                        return response()->json('errors', 'Ada Kesalahan Saat Memasukkan Data Fasilitas Lingkungan');
                    }
                    $data->save();
                }
            }
            //FASILITAS UMUM
            $kostFU = kost_fu::where('id_kost', '=', $id)->delete();
            if(count($input->fUmum)>0) {
                foreach($input->fUmum as $id_fu) {
                    $data = FU::find($id_fu);
                    if(count($data)<=0)
                    return response()->json('errors', 'Ada Kesalahan Saat Mengecek Data Fasilitas Umum');
                    $kostFUs = kost_fu::where('id_kost', '=', $id)->where('id_fu', '=', $id_fu);
                    if($kostFUs->count() > 0)
                    $kostFUs->delete();
                    $data->kostFU()->attach($kost->id);
                    if(!$data->save()) {
                        return response()->json('errors', 'Ada Kesalahan Saat Memasukkan Data Fasilitas Umum');
                    }
                    $data->save();
                }
            }
        }
        return redirect()->back()->with([
            'message_fasilitas' => 'Fasilitas dengan id ' . $id . 'telah di perbarui'
            ]);
    }

    public function konfirmasi($id) {
      $data = Kost::find($id);
      $data->konfirmasi = 1;
      $data->save();
      return redirect()->back();
    }

    public function hidekost($id) {
        $data = Kost::find($id);
        $data->konfirmasi = 0;
        $data->save();
        return redirect()->back();
      }

    public function delete($id) {
      $data = Kost::find($id);
      $data->delete();
      return redirect()->back();
    }
}
