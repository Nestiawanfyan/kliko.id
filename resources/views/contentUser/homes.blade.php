<div style="height:1px;"></div>
<nav class="navbar navbar-expand-lg navbar-light sticky-top scroll-fixed shadow-sm" id="scrollFixed" >
        <!-- <div class="navbar-toggler" style="background-color:none;padding:none;border:none;line-height:0;">
        <li style="width:300px;margin-left:-20x;">
                    <form action="{{ route('map') }}" method="get">
                        <div class="input-group search-wrap">
                            <input type="text" id="input-maps" class="shadow-sm form-control" placeholder="Cari Kost">
                            <input id="city" name="alamat" type="hidden"/>
                            <input id="Lat" name="lat" type="hidden" />
                            <input id="Long" name="long" type="hidden" />
                            <span class="input-group-btn" style="z-index:999;">
                                <button class="btn btn-search pd-btn-search" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </li>
        </div>-->

        <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/kliko/kliko-Icon.png') }}" width="45" height="45" alt="Kliko - Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 right">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#"><b>Download App</b></a>
                </li> -->
                <!-- <li style="width:400px;margin-left:-32px;" class="res-none">
                    <form action="{{ route('map') }}" method="get">
                        <div class="input-group search-wrap">
                            <input type="text" id="input-maps" class="shadow-sm form-control" placeholder="Cari Kost">
                            <input id="city" name="alamat" type="hidden"/>
                            <input id="Lat" name="lat" type="hidden" />
                            <input id="Long" name="long" type="hidden" />
                            <span class="input-group-btn" style="z-index:999;">
                                <button class="btn btn-search pd-btn-search" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </li> -->
            </ul>
            
            <ul class="navbar-nav justify-content-end">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#"><b>Cari Kost</b></a> -->
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#"><b>Bantuan</b></a> -->
                </li>
            </ul>

            <ul class="navbar-nav justify-content-end">
                @if(!Auth('user')->check())
                    <li class="nav-item">
                        <a class="btn pointer"  data-toggle="modal" data-target="#loginUser" style="background-color:#6f1994;border:1px solid #6f1994;color:#fff;padding:7px 20px;font-family: 'Didact Gothic', sans-serif;"><b>Tambah Kost Anda</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><b>Daftar</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pointer" data-toggle="modal" data-target="#loginUser" >Masuk</a>
                    </li>
                @else
                <li class="nav-item">
                    <a class="btn" style="background-color:#6f1994;border:1px solid #6f1994;color:#fff;padding:7px 20px;margin-top:12px;font-family: 'Didact Gothic', sans-serif;" href="{{ route('tambah') }}"><b>Tambah Kost Anda</b></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hover-img" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    {!! Auth('user')->user()->foto != null ?
                        '<img src="'. asset("storage/".Auth('user')->user()->foto) . '" class="rounded-circle" width="45px" height="45px">' :
                        '<img src="'. url('img/user.png') .'" class="rounded-circle"  width="30px" height="30px">'
                    !!}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">{{ Auth('user')->user()->username }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('kost.saya') }}">Kost Saya</a>
                    <a class="dropdown-item" href="{{ route('tambah') }}">Tambah Kost</a>
                    <a class="dropdown-item" href="{{ route('tambahKlipritn') }}">Tambah Kliprint</a>
                    <a class="dropdown-item" href="{{ route('profil.settings') }}">Pengaturan Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item bg-red" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>      
        </div>
</nav>

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

<script>

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
                        location.reload();
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

    // window.onscroll = function(){myFunction()};

    // var navbar      = document.getElementById("scrollFixed");
    // var fixNav    = navbar.offsetTop;
    
    // function myFunction() {
    //     if (window.pageYOffset >= fixNav) {
    //         navbar.classList.add("scroll-fixed");
    //         navbar.classList.add("shadow-sm");
    //     } else if(window.pageYOffset <= fixNav) {
    //         navbar.classList.remove("scroll-fixed");
    //         navbar.classList.remove("shadow-sm");
    //     }
    // }



</script>