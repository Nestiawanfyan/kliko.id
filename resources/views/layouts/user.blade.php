<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
      @yield('meta')
    <title>
      @yield('title') - Kliko
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
    <link rel="stylesheet" href="{{ asset('dist/css/aos.css') }}">  
    <link rel="stylesheet" href="{{ asset('dist/css/nouislider.min.css') }}">
    @yield('head-style')

    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script-->
    <script src="{{ asset('dist/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.form.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAh7znf86DomKGdnc7LkiHla3XMYWtgoTM&amp;libraries=places&amp;sensor=false&amp;region=id&amp;language=id"></script>
    @yield('head-script')
  </head>
  <body>


    @include('contentUser.homes')

    @yield('content')

    @include('includes.footer-web')

    <script src="{{ asset('dist/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('dist/js/kliko.js') }}"></script>    
    @yield('script')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({
      easing: 'ease-out-back',
      duration: 1500
    });</script>  
    
  </body>
</html>
