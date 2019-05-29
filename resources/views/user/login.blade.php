<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
      Login User - Kliko
    </title>
    
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/png" href="{{ asset('img/kliko/kliko-Icon.png') }}">
    <link rel="stylesheet" href="//identity.uchicago.edu/c/fonts/proximanova.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Bitter:700|Didact+Gothic|Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('dist/css/kliko.css') }}">  
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">  
    <link rel="stylesheet" href="{{ asset('dist/css/nouislider.min.css') }}">

    <style>
    body { background: #fafafa; display: flex; align-items: center; width: 100vw; height: 100vh; font-family: 'Roboto', sans-serif}
    .footer { border-radius: 5px; border: 1px solid #efefef; background: #fff; padding: 25px; margin-top: 15px;}
    .container { width: 360px; margin-top:-90px;}
    * { border-radius: 3px !important; }
    </style>

    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script-->
    <script src="{{ asset('dist/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.form.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </head>
  <body>
      <div class="container text-xs-center">
              <div class="w-100 logo">
                <div class="logo-center">
                <a href="{{ route('home') }}" style="color:#aa00ff;font-family:'Baloo Bhaina', cursive;"><img src="{{ asset('img/kliko/kliko-Logo.png') }}" alt="Kliko - Logo" width="135px" height="80px" style="margin: 0 auto;" ></a>
                </div>
              </div>

                @if(Session::has('error'))
                <div class="alert alert-danger" style="color:white;" >
                  {!! Session::get('error') !!}
                </div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success" style="color:white;" >
                  {!! Session::get('success') !!}
                </div>
                @endif
                @if(Session::has('warning'))
                <div class="alert alert-warning" style="color:white;" >
                  {!! Session::get('warning') !!}
                </div>
                @endif

              <div class="form-login w-100">
                <form action="{{ route('login.proses') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="baloo">Username</label>
                    <input type="text" style="font-size:16px;font-family: 'Didact Gothic', sans-serif;" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="baloo">Password</label>
                    <input type="password" name="password" style="font-size:16px;font-family: 'Didact Gothic', sans-serif;" class="form-control" id="password" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary w-100" style="padding:10px;background-color:#6f1994;border:1px solid #6f1994;margin-top:20px;">Login</button>
                </form>
                <div class="center-text" style="margin-top:20px;font-size:13px;">
                  Lupa Password ? <a href="{{ route('lupa.password') }}">Lupa</a> <br> Belum Punya Akun ? <a href="{{ route('register') }}">Daftar</a>
                </div>
              </div>


                <!-- <form action="{{ route('login.proses') }}" method="post" class="wd-100">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Email / Username">
                  </div>
                  <div class="form-group" style="position:relative;">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <a href="{{ route('lupa.password') }}" style="position: absolute; top: 20%; font-size: 14px; text-decoration: none; right: 15px;">Lupa?</a>
                  </div>
                  <button type="submit" class="btn btn-primary btn-md btn-block">Login</button>
                </form>
            <div class="footer">
              Belum memiliki akun? <a href="{{ route('register') }}">Daftar</a>
            </div> -->
    </div>
  </body>
</html>
