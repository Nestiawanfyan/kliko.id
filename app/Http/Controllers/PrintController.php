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
use App\Percetakan;
use App\PercetakanFoto;
use App\FasilitasKategori;
use App\FasilitasKost;

class PrintController extends Controller
{

    public function viewkliprint($seoTitle = null)
    {
        $kosts = Kost::where('konfirmasi', '=', 1)->orderBy('id', 'DESC')->paginate(16);
        if(isset($input->s)) {
            $kosts = Kost::where('konfirmasi', '=', 1)
            ->where(function($query) use ($input) {
                return $query->where("namaKost", "LIKE", '%'.$input->s.'%')
                ->orWhere("catatan", "LIKE", '%'.$input->s.'%');
            })->orderBy('id', 'DESC')
            ->paginate(20);
            $kosts->setPath('kosts?s='.$input->s);
            // if($kosts->count() == 0) return view('user.404-Cari');
        }
        else if(isset($input->filter)) {
            switch ($input->waktu) {
                case 'hari':
                    $waktu = "sewaHari";
                    break;
                case 'minggu':
                    $waktu = "sewaMinggu";
                    break;
                case 'bulan':
                    $waktu = "sewaBulan";
                    break;
                case 'tahun':
                    $waktu = "sewaTahun";
                    break;
                default:
                    $waktu = "sewaTahun";
                    break;
            }
            if(!empty($input->penghuni)) {
                $kosts = Kost::where('konfirmasi', '=', 1)
                            ->where('penghuni', '=', $input->penghuni)
                            ->where($waktu, '!=', 0)
                            ->where($waktu, '>=', $input->min)
                            ->where($waktu, '<=', $input->max)
                            ->paginate(20);
            }
            else {
                $kosts = Kost::where('konfirmasi', '=', 1)
                            ->where($waktu, '!=', 0)
                            ->where($waktu, '>=', $input->min)
                            ->where($waktu, '<=', $input->max)
                            ->paginate(20);
            }
            $kosts->setPath('kosts?penghuni='.$input->penghuni.'&waktu='.$input->waktu.'&min='.$input->min.'&max='.$input->max);
            // if($kosts->count() == 0) return view('user.404-Cari');
        }
        // if($kosts->count() == 0) return view('user.404');
        return view('user.viewkliprint')->with([
            'kosts' => $kosts,
        ]);
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

    public function tambahFotoprint(){
        $input = Input::all();
        $rules = array('file' => 'image|max:3000');
        $validation = Validator::make($input, $rules);
        if ($validation->fails()) return Response::make($validation->errors()->first(), 400);

        $file = Input::file('file');
        $direktori  = "image-kliprint/" . date("Y/m/");
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
        else return Response::json(['error' => 400]);
    }

    public function thumbnail($x) {
        $path = pathinfo($x);
        return $path['dirname']."/".$path['filename']."-400.".$path['extension'];
    }

    public function tambah(Request $input)
    {
        // $this->validate($input, $this->rule());  
        $percetakan = new Percetakan;
        $seoTitle = $this->seo_title($input->namaPercetakan);
        $x = 1;
        do {
            $data = Percetakan::where('seoTitle', '=', $seoTitle)->get()->count();
            if($data>0) {
                $seoTitle = $this->seo_title($input->namaPercetakan)."-".$x;
            }
            $x++;
        }
        while($data!=0);

        $percetakan->id_user        = Auth('user')->user()->id;         
        $percetakan->nama           = $input->namaPercetakan;
        $percetakan->telpon         = $input->telpPemilik;
        $percetakan->seoTitle       = $seoTitle;
        $percetakan->alamat         = $input->alamatPemilik;
        $percetakan->kode_pos       = $input->posKost;
        $percetakan->latitude       = $input->latitude;
        $percetakan->longitude      = $input->longitude;
        $percetakan->waktu_buka     = $input->waktu_buka;
        $percetakan->waktu_tutup    = $input->waktu_tutup;
        $percetakan->deskripsi      = $input->deskripsi;
        
        if(!$percetakan->save()) {
            return redirect()->back()->with('fail', 'Gagal Menambah Kost');
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
                        $foto = new PercetakanFoto;
                        $foto->url = $img;
                        $foto->id_percetakan = $percetakan->id;
                        if(!$foto->save()) {
                            return redirect()->back()->with('fail', 'Ada Kesalahan Saat Memasukkan Data Foto');
                        }
                    }
                }
            }
        }
        return redirect()->back()->with('success','Berhasil Menambahkan data.');
    }
    
    public function kliprintView($seoTitle)
    {
        // return $seoTitle;
        $kliprint = Percetakan::where('seoTitle', '=', $seoTitle)->get()->first();
        if($kliprint == null){
            return view('user.404');
        }

        return view('user.detailKliprint')->with([
            'kliprint' => $kliprint, 
        ]); 
    }

    public function seo_title($s) {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }

    public function tambahForm()
    {
        return view('user.formkliprint');
    }

}