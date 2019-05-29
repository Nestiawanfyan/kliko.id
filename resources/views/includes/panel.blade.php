<div class="row hidden-md-up">
                <div class="col-xs-3">
                    <span id="btnMenu" class="btn-bars">
                        <i class="fa fa-bars"></i>
                    </span>
                    <!-- Modal -->
                    <div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Modal tsitle</h4>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 text-xs-center">
                    <a class="navbar-brand logo-brand" style="margin-top:15px;color:#aa00ff;"  href="{{ route('home') }}">
                        <h1 class="site-title" style="font-size:40px;">
                            <!-- <img src="{{ asset('img/logo2.png') }}" alt="KostBDL"/> -->
                            kliko
                        </h1>
                    </a>
                </div>
            </div>
            <div class="row hidden-sm-down">
                <div class="col-md-2 col-lg-1 panel-title">
                    <a class="navbar-brand logo-brand" style="margin-top:15px;color:#aa00ff;" href="{{ route('home') }}">
                        <h1 class="site-title" style="font-size:40px;">
                            <!-- <img src="{{ asset('img/logo2.png') }}" alt="KostBDL"/> -->
                            kliko
                        </h1>
                    </a>
                </div>
                
                <div class="col-md-6 pull-right text-xs-right panel-btn">
                    <a href="{{ route('tambah') }}" class="btn btn-sm btn-pasang-iklan"><i class="fa fa-plus"></i> Pasang Iklan Kost Gratis</a>
                    @if(!Auth('user')->check())
                    <div class="btn-group">
                        <span class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>
                                <img src="{{ url('img/user.png') }}" class="rounded-circle">
                                <span class="nama-user">AKUN</span>
                            </strong>
                        </span>
                        <div class="dropdown-menu" style="right:0; left:auto;">
                            <a class="dropdown-item" href="{{ route('login') }}">Masuk</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Daftar</a>
                        </div>
                    </div>
                    @else
                    <div class="btn-group">
                        <span class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>
                                {!! Auth('user')->user()->foto != null ?
                                '<img src="'. asset("storage/".Auth('user')->user()->foto) . '" class="rounded-circle">' :
                                '<img src="'. url('img/user.png') .'" class="rounded-circle">'
                                !!}
                                <span class="nama-user">{{ Auth('user')->user()->username }}</span>
                            </strong>
                        </span>
                        <div class="dropdown-menu" style="right:0; left:auto;">
                            <!-- <a class="dropdown-item" href="#">Lihat Profil</a> -->
                            <a class="dropdown-item" href="{{ route('kost.saya') }}">Kost Saya</a>
                            <a class="dropdown-item" href="{{ route('tambah') }}">Tambah Kost</a>
                            <a class="dropdown-item" href="{{ route('profil.settings')}}">Pengaturan Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

<div id="menuModal">
    <div class="modal-full hidden-md-up">
        <div class="container">
            <ul class="list-item-menu">
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('kost.saya') }}">Kost Saya</a></li>
                <li><a href="{{ route('tambah') }}">Tambah Kost</a></li>
                <li><a href="{{ route('profil.settings') }}">Pengaturan Akun</a></li>
                <li>
                    @if(Auth('user')->check())
                    <a class="profil">
                        {!! Auth('user')->user()->foto != null ?
                        '<img src="'. url("content/profil-img/".Auth('user')->user()->foto) . '" class="rounded-circle">' :
                        '<img src="'. url('img/user.png') .'" class="rounded-circle">'
                        !!}
                        <span class="nama-user">
                            <small>Hello,</small>
                            <div>{{ Auth('user')->user()->username }}</div>
                        </span>
                    </a>
                    @else
                    <div class="btnLogin">
                        <a href="{{ route('login') }}">Masuk</a>
                        <a href="{{ route('register') }}">Daftar</a>
                    </div>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $("#btnMenu").click(function(){
        $( "#menuModal" ).toggle();
    });
});
</script>
