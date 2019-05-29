<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\FL;

class FLController extends Controller
{
    public function index() {
      $data = FL::all();
      return view('admin.fl.index', ['fls' => $data]);
    }

    public function create(Request $input) {
      $this->validate($input, $this->rule());

      $data           = new FL;
      $data->nama     = $input->nama;
      if($data->save()) {
        return redirect()->route('admin.fl')->with([
          'message' => 'Fasilitas Khusus Berhasil Ditambah'
        ]);
      }
      else {
        return redirect()->back()->with([
          'fail' => 'Fasilitas Khusus GAGAL Ditambah'
        ]);
      }
    }

    public function delete($id) {
      $data = FL::find($id);
      $nama = $data->nama;
      if($data->delete()) {
        return redirect()->route('admin.fl')->with([
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
      $data = FL::find($id);
      return view('admin.fl.edit')->with([
        'data' => $data
      ]);
    }

    public function edit(Request $input, $id) {
      $this->validate($input, $this->rule($id));

      $data           = FL::find($id);
      $data->nama     = $input->nama;
      if($data->save()) {
        return redirect()->route('admin.fl')->with([
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
