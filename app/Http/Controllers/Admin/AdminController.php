<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
      return view('admin.index');
    }

    public function loginForm() {
      return view('admin.login');
    }

    public function login(Request $input) {
      $username = $input->username;
      $password = $input->password;
      if(Auth('admin')->attempt(['username' => $username, 'password' => $password])) {
        return redirect()->route('admin');
      }
      return redirect()->back()->with('message', 'Login Gagal. Silahkan coba lagi.');
    }

    public function logout() {
      Auth('admin')->logout();
      return redirect()->route('admin.logout');
    }
}
