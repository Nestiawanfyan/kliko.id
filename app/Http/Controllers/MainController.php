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
use Image;
use Validator;

use App\FK;
use App\FU;
use App\FL;
use App\FKM;
use App\Parkir;
use App\Kost;
use App\Foto;
use App\Percetakan;
use App\PercetakanFoto;
use App\User;
use App\JenisHunian;
use App\Fasilitas;
use App\FasilitasKategori;
use App\JenisListrik;

class MainController extends Controller
{
    public function index() {
        $datakost       = Kost::where('id_jenis_hunian','=','1')->get();
        $datakontrakan  = Kost::where('id_jenis_hunian','=','2')->get();
        $databedeng     = Kost::where('id_jenis_hunian','=','3')->get();
        $kosts          = Kost::where('konfirmasi', '=', 1)->where('id_jenis_hunian','=','1')->orderBy('id', 'DESC')->paginate(8);
        $kontrakan      = Kost::where('konfirmasi', '=', 1)->where('id_jenis_hunian','=','2')->orderBy('id', 'DESC')->paginate(8);
        $bedeng         = Kost::where('konfirmasi', '=', 1)->where('id_jenis_hunian','=','3')->orderBy('id', 'DESC')->paginate(8);
        $percetakan     = Percetakan::orderBy('id', 'DESC')->paginate(8);
        $percetakans    = Percetakan::get();
        return view('user.index')->with([
            'percetakans'       => $percetakans,
            'percetakan'        => $percetakan,
            'dataKost'          => $datakost,
            'dataKont'          => $datakontrakan,
            'dataBed'           => $databedeng,
            'kosts'             => $kosts,
            'konts'             => $kontrakan,
            'beds'              => $bedeng,
        ]);
    }

    public function tugas()
    {
        $kosts = Kost::where('konfirmasi', '=', 1)->orderBy('id', 'DESC')->paginate(7);
        return view('tugas')->with([
            'kosts' => $kosts,
        ]);
    }

    public function kosList(Request $input) {
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
        return view('user.kosts')->with([
            'kosts' => $kosts,
        ]);
    }

    public function map(Request $input) {
        $kosts  = Kost::all();
        $alamat = (empty($input->alamat)) ? "" : $input->alamat;
        $lat    = (empty($input->lat))    ? -5.3971396 : $input->lat;
        $long   = (empty($input->long))   ? 105.2667887 : $input->long;
        $zoom   = (!empty($input->long) && !empty($input->lat)) ? 18 : 13;
        return view('user.map')->with([
            'kosts' => $kosts,
            'alamat'=> $alamat,
            'lat'   => $lat,
            'long'  => $long,
            'zoom'  => $zoom,
        ]);
    }

    public function kostView($seoTitle) {
        $kost           = Kost::where('seoTitle', '=', $seoTitle)->get()->first();
        // $user           = User::get(['id','nama','email']);
        $jenisHunian        = JenisHunian::all();
        $fasilitas          = Fasilitas::all();
        $fasilitasKategori  = FasilitasKategori::all();
        $jenisListri        = JenisListrik::all();
        if($kost == null) {
            return view('user.404');
        }
        return view('user.kost-view')->with([
            'kost'       => $kost,
            // 'users'      => $user,   
            'jhunians'          => $jenisHunian,
            'fasilitas'         => $fasilitas,
            'fasilitasKategori' => $fasilitasKategori,
            'jlistriks'         => $jenisListri,
        ]);
    }
}
