<?php

namespace App\Http\Controllers;

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
use App\Fasilitas;
use App\Fasilitaskategori;
use App\FasilitasKost;

class KostController extends Controller
{

    public function kostSaya(){
        $id_user = Auth('user')->user()->id;
        $kost = Kost::where('user_id', '=', $id_user)->orderBy('id', 'DESC')->paginate(8);
        return view('user.kost-saya',[
            'kosts' => $kost,
        ]);
    }

    public function tambahForm() {
        $fasilitas          = Fasilitas::all();
        $fasilitasKategori  = Fasilitaskategori::all();
        $jlistrik           = JenisListrik::all();
        $jhunian            = JenisHunian::all();
        return view('user.tambah')->with([
            'fasilitas'         => $fasilitas,
            'fasilitasKategori' => $fasilitasKategori,
            'jls' => $jlistrik,
            'hunian' => $jhunian,
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

    public function kostTambahFoto($idKost){
        $input = Input::all();
        $rules = array('file' => 'image|max:3000');
        $validation = Validator::make($input, $rules);
        if ($validation->fails()) return Response::make($validation->errors()->first(), 400);

        $file = Input::file('file');
        $direktori  = "image-kost/" . date("Y/m/");
        $storage  = "storage/" . $direktori;
        if(!File::exists($storage)) mkdir($storage, 0755, true);

        $filename  = $direktori . sha1(time() . time()) . "." . $file->getClientOriginalExtension();
        $filepath  = 'storage/' . $filename;
        $path = public_path($filepath);
        if(Image::make($file->getRealPath())->save($path)) {
            $filepath400  = 'storage/' . $this->thumbnail($filename);
            $path400      = public_path($filepath400);
            if(Image::make($file->getRealPath())->fit(400)->save($path400)) {
                $foto = new Foto;
                $foto->url = $filename;
                $foto->id_kost = $idKost;
                if($foto->save()) {
                    return Response::json([
                        'success' => 1,
                        'nama' => $filename,
                        'id'  => $foto->id,
                    ]);
                }
                else return Response::json([
                    'success' => 0,
                    'message' => "Gagal Memasukkan Dokumen Ke Database",
                ]);
            }
            else return Response::json([
                'success' => 0,
                'message' => "Gagal Upload Thumbnail ke Server",
            ]);
        }
        else return Response::json([
            'success' => 0,
            'message' => "Gagal Upload Foto ke Server",
        ]);
    }

    public function kostHapusFoto(Request $request)
    {
        if($request->ajax()) {
            $foto = Foto::find($request->idDokumen);
            if($foto->delete()) {
                if(File::exists('storage/' . $foto->url)) {
                    if(File::delete('storage/' . $foto->url)) {
                        return Response::json([
                            'success' => 1,
                        ]);
                    }
                    return Response::json([
                        'success' => 0,
                        'message' => 'Gagal Menghapus File Dari Server',
                    ]);
                }
                return with(['success' => 0, 'message' => "File Tidak Ada"]);
            }
            return Response::json([
                'success' => 0,
                'message' => 'Gagal Menghapus Data Dari Database',
            ]);
        }
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

    public function tambah (Request $input) {
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

        $kost->user_id         = Auth('user')->user()->id;
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
        $kost->fKhusus          = $input->f1;
        $kost->fUmum            = $input->f5;
        $kost->fLingkungan      = $input->f3;
        $kost->fKamarMandi      = $input->f2;
        // $kost->catatan          = $input->catatan;
        $kost->konfirmasi       = 0;
        if(!$kost->save()) {
            return redirect()->back()->with('fail', 'Gagal Menambah Kost');
        }

        /*Menghubungkan Table Parkir dengan Kost
        * Mengambil data Parkir terlebih dahulu menggunakan ID Parkir
        * Setelah itu menghubungkannya dengan Kost yang di ambil dari ID Kost yang baru dibuat
        */
        //FASILITAS
        if(count($input->fasilitas)>0) {
            foreach($input->fasilitas as $id) {
                $data = Fasilitas::find($id);
                if(count($data)<=0)
                return redirect()->back()->with('fail', 'Ada Kesalahan Saat Mengecek Data Fasilitas');
                $data = new FasilitasKost;
                $data->id_kost = $kost->id;
                $data->id_fasilitas = $id;
                if(!$data->save()) {
                    return redirect()->back()->with('fail', 'Ada Kesalahan Saat Memasukkan Data Fasilitas');
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
        return redirect()->route('berhasil');
    }

    public function delete($seoTitle) {
        $kost = Kost::where("seoTitle", $seoTitle)->first();
        if($kost->delete()) {
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function berhasil() {
        return view('user.berhasil');
    }

    public function editForm($seo) {
        $kost = Kost::where('seoTitle', '=', $seo)->first();
        $fasilitas          = Fasilitas::all();
        $fasilitasKategori  = Fasilitaskategori::all();
        $jlistrik           = JenisListrik::all();  
        $jhunian            = JenisHunian::all();
        return view('user.kost-edit', [
            'kost'              => $kost,
            'fasilitas'         => $fasilitas,
            'fasilitasKategori' => $fasilitasKategori,
            'jls'               => $jlistrik,
            'hunian'            => $jhunian,
        ]);
    }

    public function editPemilik(Request $input, $id) {
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
        return 0;
    }

    public function editKost(Request $input, $id) {
        $rule = array(
            'namaKost'        => 'required',
            'telpKost'        => 'numeric|min:6',
            'alamatKost'      => 'required',
            'kodePos'         => 'numeric|digits:5',
            'luasKamar'       => 'required',
            'kamarKosong'     => 'required',
            'jumlahKamar'     => 'required|numeric',
        );
        $valid = Validator::make(Input::all(), $rule);
        if ($valid->fails())
        return response()->json(array('errors' => $valid->getMessageBag()->toArray()));

        $kost = Kost::find($id);
        $kost->namaKost     = $input->namaKost; 
        $kost->telpKost     = $input->telpKost;
        $kost->alamatKost   = $input->alamatKost;
        $kost->posKost      = $input->kodePos;
        $kost->luasKamar    = $input->luasKamar;
        $kost->jumlahKamar  = $input->jumlahKamar;
        $kost->kamarKosong  = $input->kamarKosong;
        $kost->penghuni     = $input->penghuniKost;
        $kost->latitude     = $input->latitude;
        $kost->longitude    = $input->longitude;
        if($kost->save())
        if($input->ajax())
        return response()->json($kost);
        return 0;
    }

    public function editSewa(Request $input, $id) {
        $rule = array(
            'sewaHari'        => 'numeric',
            'sewaMinggu'      => 'numeric',
            'sewaBulan'       => 'numeric',
            'sewaTahun'       => 'required|numeric',
        );
        $valid = Validator::make(Input::all(), $rule);
        if ($valid->fails())
        return response()->json(array('errors' => $valid->getMessageBag()->toArray()));

        $kost = Kost::find($id);
        $kost->sewaHari     = $input->sewaHari;
        $kost->sewaMinggu   = $input->sewaMinggu;
        $kost->sewaBulan    = $input->sewaBulan;
        $kost->sewaTahun    = $input->sewaTahun;
        if($kost->save())
        if($input->ajax())
        return response()->json($kost);
        return 0;
    }

    public function editFasilitas(Request $input, $id) {
        $kost = Kost::find($id);
        $kost->fKhusus          = $input->f1;
        $kost->fUmum            = $input->f5;
        $kost->fLingkungan      = $input->f3;
        $kost->fKamarMandi      = $input->f2;
        // $kost->catatan        = $input->catatan;
        if($kost->save()){
            /*Menghubungkan Table Parkir dengan Kost
            * Mengambil data Parkir terlebih dahulu menggunakan ID Parkir
            * Setelah itu menghubungkannya dengan Kost yang di ambil dari ID Kost yang baru dibuat
            */
            //FASILITAS
            $kostFK = FasilitasKost::where('id_kost', '=', $id)->delete();
            if(count($input->fasilitase)>0) {
                foreach($input->fasilitase as $fasilitas) {
                    $data = Fasilitas::find($fasilitas);
                    if(!$data)
                    return response()->json(['errors' => 'Ada Kesalahan Saat Mengecek Data Fasilitas Khusus']);
                    $fk = new FasilitasKost;
                    $fk->id_kost = $id;
                    $fk->id_fasilitas = $fasilitas;
                    if(!$fk->save())    {
                        return response()->json(['errors' => 'Ada Kesalahan Saat Memasukkan Data Fasilitas Khusus']);
                    }
                }
            }    
        }
        return redirect()->back();
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
}
