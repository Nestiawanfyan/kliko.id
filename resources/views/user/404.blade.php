<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
      404 - Kliko
    </title>
    <link rel="icon" type="image/png" href="{{ asset('img/kliko/kliko-Icon.png') }}">
    <link rel="stylesheet" href="//identity.uchicago.edu/c/fonts/proximanova.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Bitter:700|Didact+Gothic|Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/kliko.css') }}">  
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">  
    <link rel="stylesheet" href="{{ asset('dist/css/nouislider.min.css') }}">

    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script-->
    <script src="{{ asset('dist/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.form.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/kliko.js') }}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAh7znf86DomKGdnc7LkiHla3XMYWtgoTM&amp;libraries=places&amp;sensor=false&amp;region=id&amp;language=id"></script>
  </head>
  <body>
    @include('contentUser.homes')
    <div class="container text-xs-center error-page text-danger">
      <h1 class="title">404</h1>
      <div style="font-size:25px; font-weight: 300; padding-bottom: 15px;">HALAMAN TIDAK DITEMUKAN</div>
      <div style="padding-bottom: 15px;">Halaman yang Anda cari tidak tersedia atau telah terjadi kesalahan.<br>
      Kembali ke <strong><a href="{{ route('home') }}">Beranda</a></strong> atau <strong><a href="{{ route('kosList') }}">Mencari Kost</a></strong> lagi di Kliko</div>
    </div>
    @include('includes.footer-web')
  </body>
</html>
