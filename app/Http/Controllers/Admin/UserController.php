<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
    public function index() {
      $data = User::orderBy('id', 'DESC')->get();
      return view('admin.user.index', ['users' => $data]);
    }

    public function delete($id) {
      $data = User::find($id);
      $nama = $data->nama;
      if($data->delete()) {
        return redirect()->route('admin.user')->with([
          'message' => '[ '.$nama.' ] Berhasil Dihapus'
        ]);
      }
      else {
        return redirect()->back()->with([
          'fail' => '['.$nama.'] GAGAL Dihapus'
        ]);
      }
    }

    public function editForm($id) {
      $data = User::find($id);
      return view('admin.user.edit')->with([
        'data' => $data
      ]);
    }

    public function edit(Request $input, $id) {
      $this->validate($input, $this->rule($id));

      $data           = User::find($id);
      $data->nama     = $input->nama;
      $data->email    = $input->email;
      if($data->save()) {
        return redirect()->route('admin.user')->with([
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
