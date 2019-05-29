<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\FK;

class FKController extends Controller
{
    public function index() {
      $data = FK::all();
      return view('admin.fk.index', ['fks' => $data]);
    }

    public function create(Request $input) {
      $this->validate($input, $this->rule());

      $data           = new FK;
      $data->nama     = $input->nama;
      if($data->save()) {
        return redirect()->route('admin.fk')->with([
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
      $data = FK::find($id);
      $nama = $data->nama;
      if($data->delete()) {
        return redirect()->route('admin.fk')->with([
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
      $data = FK::find($id);
      return view('admin.fk.edit')->with([
        'data' => $data
      ]);
    }

    public function edit(Request $input, $id) {
      $this->validate($input, $this->rule($id));

      $data           = FK::find($id);
      $data->nama     = $input->nama;
      if($data->save()) {
        return redirect()->route('admin.fk')->with([
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
