<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\FR;

class FRController extends Controller
{
    public function index() {
      $data = FR::all();
      return view('admin.fr.index', ['frs' => $data]);
    }

    public function create(Request $input) {
      $this->validate($input, $this->rule());

      $data           = new FR;
      $data->nama     = $input->nama;
      if($data->save()) {
        return redirect()->route('admin.fr')->with([
          'message' => 'Fasilitas Ruangan Berhasil Ditambah'
        ]);
      }
      else {
        return redirect()->back()->with([
          'fail' => 'Fasilitas Ruangan GAGAL Ditambah'
        ]);
      }
    }

    public function delete($id) {
      $data = FR::find($id);
      $nama = $data->nama;
      if($data->delete()) {
        return redirect()->route('admin.fr')->with([
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
      $data = FR::find($id);
      return view('admin.fr.edit')->with([
        'data' => $data
      ]);
    }

    public function edit(Request $input, $id) {
      $this->validate($input, $this->rule($id));

      $data           = FR::find($id);
      $data->nama     = $input->nama;
      if($data->save()) {
        return redirect()->route('admin.fr')->with([
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
