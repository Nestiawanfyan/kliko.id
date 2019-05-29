<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Image;

use App\Admin;

class AdministratorController extends Controller
{
    public function index() {
      $data = Admin::orderBy('id','DESC')->get();
      return view('admin.administrator.index', ['admins' => $data]);
    }

    public function create(Request $input) {
      $this->validate($input, $this->rule());

      $filename = "";
      if(!empty($input->file('image')))
      {
        $direktori = "content/photo/admin/";
        if(!file_exists($direktori)) { mkdir($direktori, 0755, true); }
        $fileImg = $input->file('image');
        $filename  = time() . '.' . $fileImg->getClientOriginalExtension();
        $path = public_path($direktori . $filename);
        Image::make($fileImg->getRealPath())->fit(400)->save($path);
        // Image::make(public_path($path))->fit(400)->save($path);
      }

      $data           = new Admin;
      $data->nama     = $input->nama;
      $data->email    = $input->email;
      $data->foto     = $filename;
      $data->username = $input->username;
      $data->password = bcrypt($input->password);
      if($data->save()) {
        return redirect()->route('admin.administrator')->with([
          'message' => 'Administrator Berhasil Ditambah'
        ]);
      }
      else {
        return redirect()->back()->with([
          'fail' => 'Administrator GAGAL Ditambah'
        ]);
      }
    }

    public function delete($id) {
      $data = Admin::find($id);
      $nama = $data->nama;
      $foto = $data->foto;
      if($data->delete()) {
        return redirect()->route('admin.administrator')->with([
          'message' => 'Administrator ['.$nama.'] Berhasil Dihapus'
        ]);
      }
      else {
        return redirect()->back()->with([
          'fail' => 'Administrator GAGAL Ditambah'
        ]);
      }
    }

    public function editForm($id) {
      if(Auth('admin')->user()->id == $id){
        $data = Admin::find($id);
        return view('admin.administrator.edit')->with([
          'admin' => $data
        ]);
      } else {
        return redirect()->route('admin.administrator')->with([
          'failed_access' => " Anda Bukan pemilik akun. Akses di tolak... "
        ]);
      }
    }

    public function edit(Request $input, $id) {
      $this->validate($input, $this->rule($id));

      $filename = "";
      if(!empty($input->file('image')))
      {
        $direktori = "content/photo/admin/";
        if(!file_exists($direktori)) { mkdir($direktori, 0755, true); }
        $fileImg = $input->file('image');
        $filename  = time() . '.' . $fileImg->getClientOriginalExtension();
        $path = public_path($direktori . $filename);
        Image::make($fileImg->getRealPath())->fit(400)->save($path);
        // Image::make(public_path($path))->fit(400)->save($path);
      }

      $data           = Admin::find($id);
      $data->nama     = $input->nama;
      $data->email    = $input->email;
      $data->foto     = $filename;
      $data->username = $input->username;
      $data->password = bcrypt($input->password);
      if($data->save()) {
        return redirect()->route('admin.administrator')->with([
          'message' => 'Administrator Berhasil Diubah'
        ]);
      }
      else {
        return redirect()->back()->with([
          'fail' => 'Administrator GAGAL Diubah'
        ]);
      }
    }

    public function rule($id = null) {
      return [
        'nama' => 'required',
        'email' => 'required|email|unique:admins,email,'.$id,
        'username' => 'required|alpha_dash|min:6|unique:admins,username,'.$id,
        'password' => 'required|min:6',
      ];
    }
}
