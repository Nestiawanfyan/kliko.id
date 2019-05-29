<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\FKM;

class FKMController extends Controller
{
    public function index() {
      $data = FKM::all();
      return view('admin.fkm.index', ['fkms' => $data]);
    }

    public function create(Request $input) {
      $this->validate($input, $this->rule());

      $data           = new FKM;
      $data->nama     = $input->nama;
      if($data->save()) {
        return redirect()->route('admin.fkm')->with([
          'message' => 'Fasilitas Kamar Mandi Berhasil Ditambah'
        ]);
      }
      else {
        return redirect()->back()->with([
          'fail' => 'Fasilitas Kamar Mandi GAGAL Ditambah'
        ]);
      }
    }

    public function delete($id) {
      $data = FKM::find($id);
      $nama = $data->nama;
      if($data->delete()) {
        return redirect()->route('admin.fkm')->with([
          'message' => '['.$nama.'] Berhasil Dihapus'
        ]);
      }
      else {
        return redirect()->back()->with([
          'fail' => '['.$nama.'] GAGAL Dihapus'
        ]);
      }
    }

    public function editForm($id) {
      $data = FKM::find($id);
      return view('admin.fkm.edit')->with([
        'data' => $data
      ]);
    }

    public function edit(Request $input, $id) {
      $this->validate($input, $this->rule($id));

      $data           = FKM::find($id);
      $data->nama     = $input->nama;
      if($data->save()) {
        return redirect()->route('admin.fkm')->with([
          'message' => 'Berhasil Diubah'
        ]);
      }
      else {
        return redirect()->back()->with([
          'fail' => 'GAGAL Diubah'
        ]);
      }
    }

    public function rule($id = null) {
      return [
        'nama' => 'required',
      ];
    }
}
