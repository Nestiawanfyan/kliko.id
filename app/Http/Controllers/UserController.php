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
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;

use App\FK;
use App\FU;
use App\FL;
use App\FKM;
use App\Parkir;
use App\Kost;
use App\Foto;
use App\User;

class UserController extends Controller
{

    public function lupaPassForm(Request $input){
      return view('user.lupa-password');
    }

    public function lupaPass(Request $input){
      $email = $input->email;
      $user = User::where('email', '=', $email)->first();
      if($user != null) {
        //Code for verification
        $password       = rand(100000, 1000000);
        $code           = bcrypt($password);
        $user->password = $code;
        if($user->save()) {
          // Variable data ini yang berupa array ini akan bisa diakses di dalam "view".
          $data = [
            'nama'      => $user->nama,
            'email'     => $user->email,
            'username'  => $user->username,
            'password'  => $password
          ];
          // "emails.hello" adalah nama view.
          Mail::send('emails.lupaPass', $data, function ($mail) use ($user)
          {
            $mail->to($user->email, $user->nama);
            $mail->subject('Password Anda Telah Diubah');
          });

          return redirect()->route('home')->with([
            'success' => '<strong>Password Berhasil Diubah!</strong> Silahkan cek email Anda untuk melihat password baru Anda.',
            'warning' => 'Pastikan anda segera login dan mengubah Password segera di pengaturan Profile.',
          ]);
        }
      }
      return back()->with('error', 'Email belum terdaftar');
    }

    public function loginForm(){
      return view('user.login');
    }

    public function login(Request $input) {
      if($input->ajax()){
        $username = $input->username;
        $password = $input->password;
        $user = User::where('username', '=', $username)->first();
        if($user != null) {
          if($user->konfirmasi == 1) {
            if(Auth('user')->attempt(['username' => $username, 'password' => $password])) {
              // return with(['berhasil' => 'Berhasil Login']);
              // $result = ['pesan' => 'berhasil' ];
              return Response::json([
                'success' => 1,
                'message' => '<div class="alert alert-success" style="color:white;" >Berhasil Login...</div>'
            ]);
            }
            // return with(['error' => 'Login Gagal. Username atau password salah. Silahkan coba lagi.']);
            return Response::json([
              'success' => 0,
              'message' => '<div class="alert alert-danger" style="color:white;" >Login Gagal. Username atau Password Salah. Sialakan Coba Lagi.</div>'
            ]);
          }
          // return with([
          //   'error' => '<strong style="font-size:17px;text-align:center;margin-bottom:5px;">Email belum dikonfirmasi!</strong> <br> Silahkan cek email Anda dan lakukan konfirmasi untuk bisa login.
          //                 Belum dapat email? <a href="'.route("email.resend", ["username" => $user->username]).'" style=" color:#90caf9; ">Kirim Ulang.</a>'
          // ]);
          return Response::json([
            'success' => 2,
            'message' => '<div class="alert alert-warning" style="color:white;" ><strong style="font-size:17px;text-align:center;margin-bottom:5px;">Email belum dikonfirmasi!</strong> <br> Silahkan cek email Anda dan lakukan konfirmasi untuk bisa login.
                           Belum dapat email? <a href="'.route("email.resend", ["username" => $user->username]).'" style=" color:#90caf9; ">Kirim Ulang.</a></div>',
          ]);
          // $result = ['pesan' => 'error onfrm' ];
        }
        // return with(['error' => 'akun tidak terdaftar']);
        return Response::json([
          'success' => 0,
          'message' => '<div class="alert alert-danger" style="color:white;" >Akun tidak terdaftar.</div>'
        ]);
      }
    }

    public function logout() {
      Auth('user')->logout();
      return redirect()->back();
    }


    public function register(){
      return view('user.register');
    }

    public function emailVerification(Request $input){
      $user = User::where('username', '=', $input->username)
                    ->where('kode_konfirmasi', '=', $input->code)
                    ->first();
      if($user != null){
        $user->konfirmasi = 1;
        $user->kode_konfirmasi = null;
        if($user->save())
          return redirect()->route('login')->with('success', 'Email Anda Sudah Terverifikasi. Silahkan Login');
      }
      return view('user.home');
    }

    public function resendEmail($username){
      $user = User::where('username', '=', $username)
                    ->first();
      if($user != null){
        //Code for verification
        $code                   = bcrypt(rand(1000,5000));
        $user->kode_konfirmasi  = $code;
        if($user->save()){
          // Variable data ini yang berupa array ini akan bisa diakses di dalam "view".
          $data = [
            'nama'      => $user->nama,
            'username'  => $user->username,
            'code'      => $code
          ];
          // "emails.hello" adalah nama view.
          Mail::send('emails.emails', $data, function ($mail) use ($user)
          {
            $mail->to($user->email, 'InfoKOST');
            $mail->subject('Konfirmasi Email Anda');
          });

          return redirect()->route('login')->with([
            'success' => '<strong>Berhasil Terkirim!</strong> Silahkan cek email Anda dan lakukan konfirmasi untuk bisa login.
                          Belum dapat email? <a href="'.route("email.resend", ["username" => $user->username]).'">Kirim Ulang.</a>'
          ]);
        }
      }
      return redirect()->route('login')->with('error', 'Akun belum terdaftar.');
    }

    public function prosesRegister(Request $input){
      $this->validate($input, [
        'name'      => 'required',
        'email'     => 'required|email|unique:users,email',
        'username'  => 'required|alpha_dash|unique:users,username|min:6',
        'password'  => 'required|min:6|confirmed',
      ]);

      $user = new User;
      $user->nama             = $input->name;
      $user->email            = $input->email;
      $user->username         = $input->username;
      $user->password         = bcrypt($input->password);
      //Code for verification
      $code                   = bcrypt(rand(1000,5000));
      $user->kode_konfirmasi  = $code;
      if($user->save()) {
        // Variable data ini yang berupa array ini akan bisa diakses di dalam "view".
        $data = [
          'nama'      => $user->name,
          'username'  => $user->username,
          'code'      => $code
        ];

        // "emails.hello" adalah nama view.
        Mail::send('emails.emails', $data, function ($mail) use ($user)
        {
          // Email dikirimkan ke address "momo@deviluke.com"
          // dengan nama penerima "Momo Velia Deviluke"
          $mail->to($user->email, 'InfoKOST');
          $mail->subject('Konfirmasi Email Anda');
        });
        return redirect()->route('home')->with([
          'success' => '<strong style="color:#fff;">Berhasil Daftar!</strong> Silahkan cek email Anda dan lakukan konfirmasi untuk bisa <a class="pointer" style=" color:#90caf9; " data-toggle="modal" data-target="#loginUser">login.</a>
                        Belum dapat email? <a href="'.route("email.resend", ["username" => $user->username]).'" style=" color:#90caf9; ">Kirim Ulang.</a>'
        ]);
      }
      return back()->with('error', '<strong>Heads up!</strong> This copy is a work in progress.');
    }

    public function profilSettings(){
      $user = User::find(Auth('user')->user()->id);
      return view('user.profil-settings')->with([
        'user' => $user,
      ]);
    }

    public function umum(Request $input, $id){
      $rule = array(
                  'name'      => 'required',
                  'email'     => 'required|email|unique:users,email,'.$id,
                  'username'  => 'required|alpha_dash|unique:users,username,'.$id.'|min:6',
              );
      $valid = Validator::make(Input::all(), $rule);
      if ($valid->fails())
      return response()->json(array('errors' => $valid->getMessageBag()->toArray()));

      $user = User::find($id);
      $user->nama     = $input->name;
      $user->email    = $input->email;
      $user->username = $input->username;
      if($user->save()) {
        if($input->ajax()){
          return response()->json($user);
        }
        return redirect()->route('home');
      }
    }

    public function uploadPhoto(Request $input, $id){
      list($type, $input->img) = explode(';', $input->img);
      list(, $input->img)      = explode(',', $input->img);
      $code = base64_decode($input->img);
      $date 			= date("Y/m/");                 //Tahun/Bulan
      $username = Auth('user')->user()->username;
      $direktori  = "storage/image-profil/" . $date;
      if(!file_exists($direktori)) mkdir($direktori, 0755, true);
      if(file_put_contents($direktori . '/'. time() .'.jpg', $code)){
        $user = User::find($id);
        $user->foto = "image-profil/" . $date . '/' . time() .'.jpg';
        if($user->save())
          if($input->ajax()){
            return response()->json($user);
          }
        else {
          return 2;
        }
      }
      return 0;
    }

    public function pass(Request $input, $id){
      $rule = array(
                'oldPass' => 'required|min:6',
                'newPass' => 'required|min:6',
                'newPass2' => 'required|min:6',
              );
      $valid = Validator::make(Input::all(), $rule);
      if ($valid->fails())
        return response()->json(array('errors' => $valid->getMessageBag()->toArray()));
      $user = User::find($id);
      if(Hash::check($input->oldPass, $user->password)) {
        if($input->newPass == $input->newPass2){
          $user->password = bcrypt($input->newPass);
          if($user->save()) {
            if($input->ajax()){
              return response()->json($user);
            }
            else{
              return with(['error' => 4, 'message' => "error while binding data"]);
            }
          }
          else {
            return with(['error' => 3, 'message' => "error while saving data"]);
          }
        }
        else{
          return with(['error' => 2, 'message' => "the password is not the same"]);
        }
      }
      else {
        return with(['error' => 1, 'message' => "The old password is wrong"]);
      }

    }
}
