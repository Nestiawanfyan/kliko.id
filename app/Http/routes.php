<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/email', function()
{

    // Variable data ini yang berupa array ini akan bisa diakses di dalam "view".
    $data = ['prize' => 'Peke', 'total' => 3 ];

    // "emails.hello" adalah nama view.
    Mail::send('emails.tes', $data, function ($mail)
    {
      // Email dikirimkan ke address "momo@deviluke.com"
      // dengan nama penerima "Momo Velia Deviluke"
      $mail->to('nikirahmadiwiharto@gmail.com', 'InfoKOST');
      $mail->subject('Konfirmasi Email');
    });

    return 1;

});



//============================================================================
//  GUEST
//============================================================================
Route::get('/', [
  'uses'  => 'MainController@index',
  'as'    => 'home'
]);
Route::get('/tugaspakdwi', [
  'uses'  => 'MainController@tugas',
  'as'    => 'tugas'
]);
Route::get('/kosts/{s?}', [
  'uses'  => 'MainController@kosList',
  'as'    => 'kosList'
]);
Route::get('/map', [
  'uses'  => 'MainController@map',
  'as'    => 'map'
]);
Route::get('/kost/{kost}', [
  'uses'  => 'MainController@kostView',
  'as'    => 'kost.view'
]);
Route::get('/kliprint/{kliprint}', [
  'uses'  => 'PrintController@kliprintView',
  'as'    => 'kliprint.view'
]);
Route::get('/daftar', [
  'uses'  => 'UserController@register',
  'as'    => 'register'
]);
Route::post('/daftar', [
  'uses'  => 'UserController@prosesRegister',
  'as'    => 'proses.register'
]);
Route::get('/verify-email', [
  'uses'  => 'UserController@emailVerification',
  'as'    => 'email.verification'
]);
Route::get('/resend-email/{username}', [
  'uses'  => 'UserController@resendEmail',
  'as'    => 'email.resend'
]);
Route::get('/lupa-password', [
  'uses'  => 'UserController@lupaPassForm',
  'as'    => 'lupa.password'
]);
Route::post('/lupa-password', [
  'uses'  => 'UserController@lupaPass',
  'as'    => 'lupa.password.proses'
]);
// Route::get('/login', [
//   'uses'  => 'UserController@loginForm',
//   'as'    => 'login'
// ]);
Route::post('/login', [
  'uses'  => 'UserController@login',
  'as'    => 'login.proses'
]);

Route::get('/kliprint/{s?}', [
  'uses'  => 'PrintController@viewkliprint',
  'as'    => 'kliprint'
]);


//============================================================================
//  USER LOGIN
//============================================================================
Route::group([
  'middleware' => 'users',
], function() {
  Route::get('/logout', [
    'uses'  => 'UserController@logout',
    'as'    => 'logout'
  ]);

  //----- KOST ------------------------//
  Route::get('/profil/kost', [
    'uses'  => 'KostController@kostSaya',
    'as'    => 'kost.saya'
  ]);
  Route::get('/profil/kliprint', [
    'uses'  => 'KostController@kostSaya',
    'as'    => 'kliprint.saya'
  ]);
  Route::get('/profil/kost/tambah-kost', [
    'uses'  => 'KostController@tambahForm',
    'as'    => 'tambah'
  ]);
  Route::get('/profil/kliprint/tambah-kliprint', [
    'uses'  => 'PrintController@tambahForm',
    'as'    => 'tambahKlipritn'
  ]);
  Route::get('/profil/kost/delete-kost/{id}', [
    'uses'  => 'KostController@delete',
    'as'    => 'delete'
  ]);
  Route::post('/profil/kost/tambah-kost', [
    'uses'  => 'KostController@tambah',
    'as'    => 'proses-tambah'
  ]);
  Route::post('/profil/kost/tambah-percetakan', [
    'uses'  => 'PrintController@tambah',
    'as'    => 'proses-tambah-percetakan'
  ]);
  Route::post('/profil/kost/tambah-foto', [
    'uses'  => 'KostController@tambahFoto',
    'as'    => 'proses-tambah-foto'
  ]);
  Route::post('/profil/kost/tambah-foto-kliprint', [
    'uses'  => 'PrintController@tambahFotoprint',
    'as'    => 'proses-tambah-foto-kliprint'
  ]);
  Route::post('/profil/kost/hapus-foto', [
    'uses'  => 'KostController@hapusFoto',
    'as'    => 'proses-hapus-foto'
  ]);
  Route::get('/profil/kost/{idKost}/get-foto', [
    'uses'  => 'KostController@getFoto',
    'as'    => 'kost.proses-get-foto'
  ]);
  Route::post('/profil/kost/{idKost}/tambah-foto', [
    'uses'  => 'KostController@kostTambahFoto',
    'as'    => 'kost.proses-tambah-foto'
  ]);
  Route::post('/profil/kost/{idKost}/hapus-foto', [
    'uses'  => 'KostController@kostHapusFoto',
    'as'    => 'kost.proses-hapus-foto'
  ]);
  Route::get('/profil/kost/berhasil', [
    'uses'  => 'KostController@berhasil',
    'as'    => 'berhasil'
  ]);
  Route::get('/profil/edit-kost/{seo}', [
    'uses'  => 'KostController@editForm',
    'as'    => 'edit'
  ]);
  Route::post('/profil/edit-kost/pemilik/{id}', [
    'uses'  => 'KostController@editPemilik',
    'as'    => 'edit.pemilik'
  ]);
  Route::post('/profil/edit-kost/kost/{id}', [
    'uses'  => 'KostController@editKost',
    'as'    => 'edit.kost'
  ]);
  Route::post('/profil/edit-kost/sewa/{id}', [
    'uses'  => 'KostController@editSewa',
    'as'    => 'edit.sewa'
  ]);
  Route::post('/profil/edit-kost/fasilitas/{id}', [
    'uses'  => 'KostController@editFasilitas',
    'as'    => 'edit.fasilitas'
  ]);
  //----- KOST ------------------------//

  Route::get('/profil/settings', [
    'uses'  => 'UserController@profilSettings',
    'as'    => 'profil.settings'
  ]);
  Route::post('/profil/settings/umum/{id}', [
    'uses'  => 'UserController@umum',
    'as'    => 'profil.settings.umum'
  ]);
  Route::post('/profil/settings/pass/{id}', [
    'uses'  => 'UserController@pass',
    'as'    => 'profil.settings.pass'
  ]);
  Route::post('/profil/settings/photo/{id}', [
    'uses'  => 'UserController@uploadPhoto',
    'as'    => 'profil.settings.photo'
  ]);
});


//============================================================================
//  ADMIN LOGIN
//============================================================================
Route::get('/admin/login', [
  'uses' => 'Admin\AdminController@loginForm',
  'as'   => 'admin.login'
]);
Route::post('/admin/login', [
  'uses' => 'Admin\AdminController@login',
  'as'   => 'admin.login'
]);


Route::group([
  'prefix' => 'admin',
  'middleware' => 'admin',
], function() {
  Route::get('/', [
    'uses' => 'Admin\AdminController@index',
    'as'   => 'admin'
  ]);
  Route::get('/logout', [
    'uses' => 'Admin\AdminController@logout',
    'as'   => 'admin.logout'
  ]);

  //-----------------------------Kost Admin
  Route::group([
    'prefix' => 'kost',
  ], function() {
    Route::get('/', [
      'uses' => 'Admin\KostController@index',
      'as'   => 'admin.kost'
    ]);
    Route::get('/konfirmasi/{id}', [
      'uses' => 'Admin\KostController@konfirmasi',
      'as'   => 'admin.kost.konfirmasi'
    ]);
    Route::get('/hidekost/{id}', [
      'uses' => 'Admin\KostController@hidekost',
      'as'   => 'admin.kost.hidekost',
    ]);
    Route::get('/delete/{id}', [
      'uses' => 'Admin\KostController@delete',
      'as'   => 'admin.kost.delete'
    ]);
    Route::get('/update/{id}', [
      'uses' => 'Admin\KostController@update',
      'as'   => 'admin.kost.update'
    ]);
    Route::get('/create', [
      'uses' => 'Admin\KostController@create',
      'as'   => 'admin.kost.create'
    ]);
    Route::post('/tambah-kost', [
      'uses' => 'Admin\KostController@tambah',
      'as'   => 'admin.kost.tambahKost'
    ]);
    Route::post('/tambah-foto', [
      'uses' => 'Admin\KostController@tambahFoto',
      'as'   => 'admin.kost.tambahFoto'
    ]);
    Route::post('/hapus-foto', [
      'uses' => 'Admin\KostController@hapusFoto',
      'as'   => 'admin.kost.hapusFoto'
    ]);

    // update - kost - admin
    Route::post('/update-pemilik/{id}', [
      'uses' => 'Admin\KostController@updatePemilik',
      'as'   => 'admin.kost.updatePemilik'
    ]);
    Route::post('/update-kost/{id}', [
      'uses' => 'Admin\KostController@updateKost',
      'as'   => 'admin.kost.updateKost'
    ]);
    Route::post('/update-sewa/{id}', [
      'uses' => 'Admin\KostController@updateSewa',
      'as'   => 'admin.kost.updateSewa'
    ]);
    Route::post('/update-fasilitas/{id}', [
      'uses' => 'Admin\KostController@updateFasilitas',
      'as'   => 'admin.kost.updateFasilitas'
    ]);    
  });

  //-----------------------------ADMINISTRATOR
  Route::group([
    'prefix' => 'administrator',
  ], function() {
    Route::get('/', [
      'uses' => 'Admin\AdministratorController@index',
      'as'   => 'admin.administrator'
    ]);
    Route::post('/create', [
      'uses' => 'Admin\AdministratorController@create',
      'as'   => 'admin.administrator.create'
    ]);
    Route::get('/delete/{id}', [
      'uses' => 'Admin\AdministratorController@delete',
      'as'   => 'admin.administrator.delete'
    ]);
    Route::get('/edit/{id}', [
      'uses' => 'Admin\AdministratorController@editForm',
      'as'   => 'admin.administrator.editForm'
    ]);
    Route::post('/edit/{id}', [
      'uses' => 'Admin\AdministratorController@edit',
      'as'   => 'admin.administrator.edit'
    ]);
  });

  //-----------------------------FASILITAS KAMAR MANDI
  Route::group([
    'prefix' => 'fasilitas-kamar-mandi',
  ], function() {
    Route::get('/', [
      'uses' => 'Admin\FKMController@index',
      'as'   => 'admin.fkm'
    ]);
    Route::post('/create', [
      'uses' => 'Admin\FKMController@create',
      'as'   => 'admin.fkm.create'
    ]);
    Route::get('/delete/{id}', [
      'uses' => 'Admin\FKMController@delete',
      'as'   => 'admin.fkm.delete'
    ]);
    Route::get('/edit/{id}', [
      'uses' => 'Admin\FKMController@editForm',
      'as'   => 'admin.fkm.editForm'
    ]);
    Route::post('/edit/{id}', [
      'uses' => 'Admin\FKMController@edit',
      'as'   => 'admin.fkm.edit'
    ]);
  });

  //-----------------------------FASILITAS KHUSUS
  Route::group([
    'prefix' => 'fasilitas-khusus',
  ], function() {
    Route::get('/', [
      'uses' => 'Admin\FKController@index',
      'as'   => 'admin.fk'
    ]);
    Route::post('/create', [
      'uses' => 'Admin\FKController@create',
      'as'   => 'admin.fk.create'
    ]);
    Route::get('/delete/{id}', [
      'uses' => 'Admin\FKController@delete',
      'as'   => 'admin.fk.delete'
    ]);
    Route::get('/edit/{id}', [
      'uses' => 'Admin\FKController@editForm',
      'as'   => 'admin.fk.editForm'
    ]);
    Route::post('/edit/{id}', [
      'uses' => 'Admin\FKController@edit',
      'as'   => 'admin.fk.edit'
    ]);
  });

  //-----------------------------FASILITAS LINGKUNGAN
  Route::group([
    'prefix' => 'fasilitas-lingkungan',
  ], function() {
    Route::get('/', [
      'uses' => 'Admin\FLController@index',
      'as'   => 'admin.fl'
    ]);
    Route::post('/create', [
      'uses' => 'Admin\FLController@create',
      'as'   => 'admin.fl.create'
    ]);
    Route::get('/delete/{id}', [
      'uses' => 'Admin\FLController@delete',
      'as'   => 'admin.fl.delete'
    ]);
    Route::get('/edit/{id}', [
      'uses' => 'Admin\FLController@editForm',
      'as'   => 'admin.fl.editForm'
    ]);
    Route::post('/edit/{id}', [
      'uses' => 'Admin\FLController@edit',
      'as'   => 'admin.fl.edit'
    ]);
  });

  //-----------------------------FASILITAS UMUM
  Route::group([
    'prefix' => 'fasilitas-umum',
  ], function() {
    Route::get('/', [
      'uses' => 'Admin\FUController@index',
      'as'   => 'admin.fu'
    ]);
    Route::post('/create', [
      'uses' => 'Admin\FUController@create',
      'as'   => 'admin.fu.create'
    ]);
    Route::get('/delete/{id}', [
      'uses' => 'Admin\FUController@delete',
      'as'   => 'admin.fu.delete'
    ]);
    Route::get('/edit/{id}', [
      'uses' => 'Admin\FUController@editForm',
      'as'   => 'admin.fu.editForm'
    ]);
    Route::post('/edit/{id}', [
      'uses' => 'Admin\FUController@edit',
      'as'   => 'admin.fu.edit'
    ]);
  });

    //-----------------------------FASILITAS Ruangan
    Route::group([
      'prefix' => 'fasilitas-ruangan',
    ], function() {
      Route::get('/', [
        'uses' => 'Admin\FRController@index',
        'as'   => 'admin.fr'
      ]);
      Route::post('/create', [
        'uses' => 'Admin\FRController@create',
        'as'   => 'admin.fr.create'
      ]);
      Route::get('/delete/{id}', [
        'uses' => 'Admin\FRController@delete',
        'as'   => 'admin.fr.delete'
      ]);
      Route::get('/edit/{id}', [
        'uses' => 'Admin\FRController@editForm',
        'as'   => 'admin.fr.editForm'
      ]);
      Route::post('/edit/{id}', [
        'uses' => 'Admin\FRController@edit',
        'as'   => 'admin.fr.edit'
      ]);
    });

     //-----------------------------Data User
     Route::group([
      'prefix' => 'user',
    ], function() {
      Route::get('/', [
        'uses' => 'Admin\UserController@index',
        'as'   => 'admin.user'
      ]);
      Route::get('/delete/{id}', [
        'uses' => 'Admin\UserController@delete',
        'as'   => 'admin.user.delete'
      ]);
      Route::get('/edit/{id}', [
        'uses' => 'Admin\UserController@editForm',
        'as'   => 'admin.user.editForm'
      ]);
      Route::post('/edit/{id}', [
        'uses' => 'Admin\UserController@edit',
        'as'   => 'admin.user.edit'
      ]);
    });

});
