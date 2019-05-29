<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
      Register User - Kliko
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
    .container { width: 360px;}
    * { border-radius: 3px !important; }
    .text{text-align:center;font-size:17px;font-family: 'Didact Gothic', sans-serif;}
    </style>

    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script-->
    <script src="{{ asset('dist/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.form.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </head>
<body>
    <div class="container text-xs-center" style="margin-top:170px;"><br><br><br>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="row">
                    <div class="w-100 logo">
                        <div class="logo-center">
                            <a href="{{ route('home') }}" style="color:#aa00ff;font-family:'Baloo Bhaina', cursive;"><img src="{{ asset('img/kliko/kliko-Logo.png') }}" alt="Kliko - Logo" width="135px" height="80px" style="margin: 0 auto;" ></a>
                        </div>
                    </div>

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                        <p class="text">
                            Mendaftar untuk dapat mempromosikan kos-kosan Anda atau Mencari kos - kosan di Bandar Lampung
                        </p>
                        <div class="form-login w-100">
                            <form class="form" action="{{ route('proses.register') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="baloo">Nama Lengkap</label>
                                    <input type="nama" name="name" style="font-size:16px;font-family: 'Didact Gothic', sans-serif;" class="form-control" value="{{ old('name') }}" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="baloo">Email</label>
                                    <input type="email" name="email" style="font-size:16px;font-family: 'Didact Gothic', sans-serif;" class="form-control" value="{{ old('email') }}" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="baloo">Username</label>
                                    <input type="text" name="username" style="font-size:16px;font-family: 'Didact Gothic', sans-serif;" class="form-control" value="{{ old('username') }}" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="baloo">Password</label>
                                    <input type="password" name="password" style="font-size:16px;font-family: 'Didact Gothic', sans-serif;" class="form-control" placeholder="Password" id="txtNewPassword">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="baloo">Confirm Password</label>
                                    <input type="password" name="password_confirmation" style="font-size:16px;font-family: 'Didact Gothic', sans-serif;" class="form-control" placeholder="Konfirmasi Password" id="txtConfirmPassword" onChange="checkPasswordMatch();">
                                    <small id="divCheckPasswordMatch"></small>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" style="padding:10px;background-color:#6f1994;border:1px solid #6f1994;margin-top:20px;">Daftar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <p style="text-align:center;margin:20px 0;font-size:14px;">
                    Dengan mendaftarkan diri anda di Kliko, Anda telah kami nyatakan sudah membaca dan menyetuji <br> <a href="#">Term</a> & <a href="">Privacy Policy</a>
                </p>
                @if(!Auth('user')->check())
                <div class="center-text" style="margin-top:20px;font-size:13px;">
                  Sudah Punya Akun ? <a class="pointer" data-toggle="modal" data-target="#loginUser" href="#">Login</a>
                </div>
                @endif
                <br><br><br><br>
            </div>
        </div>
    </div>

    <!-- Modal Login -->
    <div class="modal fade" id="loginUser" tabindex="-1" role="dialog" aria-labelledby="loginUsermodel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Login User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-login w-100">
                        <form method="post" id="loginUser">
                        {{ csrf_field() }}
                        <div id="message-login"></div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="baloo">Username</label>
                            <input type="text" style="font-size:16px;font-family: 'Didact Gothic', sans-serif;" name="username" class="form-control enter" id="username" aria-describedby="emailHelp" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="baloo">Password</label>
                            <input type="password" name="password" style="font-size:16px;font-family: 'Didact Gothic', sans-serif;" class="form-control enter" id="password" placeholder="Password">
                        </div>
                        <input id="btnLogin" type="button" class="btn btn-primary w-100" value="login" style="padding:10px;background-color:#6f1994;border:1px solid #6f1994;margin-top:20px;">
                        </form>
                        <div class="center-text" style="margin-top:20px;font-size:13px;">
                        Lupa Password ? <a href="{{ route('lupa.password') }}">Lupa</a> <br> Belum Punya Akun ? <a href="{{ route('register') }}">Daftar</a>
                        </div><br><br>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function(){
            
            $('.enter').keypress(function(e){
                if(e.which === 13){
                    $('#btnLogin').click();
                }
            });

            $('#btnLogin').click(function(){
                var username = $('#username').val();
                var password = $('#password').val();
                var url      = $('#loginUser').attr('value');

                $('#btnLogin').attr('value','Silakan Tunggu...');

                $.ajax({
                    url: " {{ route('login.proses') }} ",
                    data: {
                        '_token'  : $('input[name=_token]').val(),
                        'username': username,
                        'password': password,
                    },
                    type: 'POST',
                    success: function(data){
                        if(data.success == 1){
                            $('#btnLogin').attr('value','Berhasil...');
                            $('#message-login').html(data.message);
                            window.location = '{{ route("home") }}';
                        } else {
                            $('#btnLogin').attr('value','Login');
                            $('#message-login').html(data.message);
                        }
                    },
                    error: function(){
                    }
                });
            });
        });

    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();

        if (password != confirmPassword){
            $("#divCheckPasswordMatch").html("Passwords tidak cocok!");
            document.getElementById('divCheckPasswordMatch').style.color = "red";
        }else if(password == ""){
            $("#divCheckPasswordMatch").html("");
        }else{
            $("#divCheckPasswordMatch").html("Passwords cocok.");
            document.getElementById('divCheckPasswordMatch').style.color = "green";
        }
    }

    $(document).ready(function () {
        $("#txtConfirmPassword").keyup(checkPasswordMatch);
        $("#txtNewPassword").keyup(checkPasswordMatch);
    });
    </script>
</body>
</html>
