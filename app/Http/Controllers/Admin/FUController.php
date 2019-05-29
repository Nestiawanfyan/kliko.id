<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\FU;

class FUController extends Controller
{
    public function index() {
      $data = FU::all();
      return view('admin.fu.index', ['fus' => $data]);
    }

    public function create(Request $input) {
      $this->validate($input, $this->rule());

      $data           = new FU;
      $data->nama     = $input->nama;
      if($data->save()) {
        return redirect()->route('admin.fu')->with([
          'message' => 'Fasilitas Umum Berhasil Ditambah'
        ]);
      }
      else {
        return redirect()->back()->with([
          'fail' => 'Fasilitas Umum GAGAL Ditambah'
        ]);
      }
    }

    public function delete($id) {
      $data = FU::find($id);
      $nama = $data->nama;
      if($data->delete()) {
        return redirect()->route('admin.fu')->with([
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
      $data = FU::find($id);
      return view('admin.fu.edit')->with([
        'data' => $data
      ]);
    }

    public function edit(Request $input, $id) {
      $this->validate($input, $this->rule($id));

      $data           = FU::find($id);
      $data->nama     = $input->nama;
      if($data->save()) {
        return redirect()->route('admin.fu')->with([
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
