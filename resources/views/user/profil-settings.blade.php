@extends('layouts.user')

@section('title')
Pengaturan Profil
@endsection('title')

@section('head-style')
<style>
.cropit-preview {
    background-color: #f8f8f8;
    background-size: cover;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-top: 7px;
    width: 240px;
    height: 240px;
    margin: 0 auto;
    background-size: cover;
    background: url({{ url('dist/img/avatar.png') }});
    background-size: cover;
}
#foto { visibility: hidden; position: absolute; }

.cropit-preview-image-container {
    cursor: move;
}

input[type="range" i] {
    -webkit-appearance: slider-horizontal;
    color: rgb(144, 144, 144);
    padding: initial;
    border: initial;
    margin: 2px;
    -webkit-rtl-ordering: logical;
    user-select: text;
    cursor: auto;
}

.cropit-image-zoom-input{
    margin: 0 auto;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    height: 5px;
    background: #eee;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    outline: none;
}

.image-size-label {
    margin-top: 10px;
}

.control-wrapper {
    display: inline-flex;
    align-items: center;
    margin-top: 20px;
}

.control-wrapper .button-control {
    margin-right: 30px;
}

.control-wrapper .button-control .el {
    background: none;
}

.control-wrapper .el{
    margin-right: 0px;
}

input, .export {
    display: block;
}
</style>
@endsection('head-style')

@section('head-script')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{{ URL::to('dist/js/jquery.cropit.js')}}"></script>
@endsection('head-script')

@section('content')

<!-- <div class="pageheader small text-xs-center"> -->
    <!-- <div class="tttt"> -->
    <div class="container" style="margin-top:40px;font-family: 'Didact Gothic', sans-serif;">
            <div class="row">
                <div class="col-xs-12 title-wrap">
                    <h1 class="title-web" style="color:#424242;">Pengaturan Akun</h1>
                </div>
            </div>
        </div>
    <!-- </div> -->
<!-- </div> -->
<div class="container content-wrapper">
    <div class="row">
        <div class="col-md-3">
            @include('includes.profil-menu')
        </div>
        <div class="col-md-9" id="setting">
            <form class="card shadow" method="post" action="{{ route('profil.settings.umum', ['id' => $user->id]) }}" style="margin-bottom:20px;">
                {{ csrf_field() }}
                <!-- <div class="card-header" role="tab" id="heading1"> -->
                    <a id="infoUmum" class="title" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseOne" href="#collapse1">
                        Informasi Umum
                    </a>
                <!-- </div> -->
                <div id="collapse1" class="collapse in padding-p-setting show" role="tabpanel" aria-labelledby="infoUmum" data-parent="#setting">
                    <div class="card-block">
                        <div id="name" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Nama</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="name" value="{{ $user->nama }}">
                                <small></small>
                            </div>
                        </div>
                        <div id="email" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Email</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                                <small></small>
                            </div>
                        </div>
                        <div  id="username" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Username</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="username" value="{{ $user->username }}">
                                <small></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label"></label>
                            <div class="col-xs-12 col-md-10 input">
                                <button type="button" id="umum" class="btn btn-primary font-weight-bold">SIMPAN</button>
                                <i id="loadingUmum" class="" style="font-size: 20px; vertical-align:middle; margin-left: 15px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
            // add function
            $("#umum").click(function() {
                $(window).ajaxStart(function(){
                    $('#collapse3 #loadingPhoto').removeClass();
                    $('#collapse2 #loadingPass').removeClass();
                    $('#collapse1 #loadingUmum').removeClass();
                    $('#collapse1 #loadingUmum').addClass('fa fa-refresh fa-spin fa-3x fa-fw');
                });
                $.ajax({
                    type: 'post',
                    url: "{{ route('profil.settings.umum', ['id' => $user->id]) }}",
                    data: {
                        '_token'  : $('input[name=_token]').val(),
                        'name'    : $("#name input").val(),
                        'email'   : $("#email input").val(),
                        'username': $("#username input").val()
                    },
                    success: function(data) {
                        if (data.errors) {
                            if(data.errors.name){
                                $("#name").addClass("has-danger");
                                $("#name .input input").addClass("form-control-danger");
                                $("#name .input small").text(data.errors.name);
                            }
                            else if(data.errors.email){
                                $("#email").addClass("has-danger");
                                $("#email .input input").addClass("form-control-danger");
                                $("#email .input small").text(data.errors.email);
                            }
                            else if(data.errors.username){
                                $("#username").addClass("has-danger");
                                $("#username .input input").addClass("form-control-danger");
                                $("#username .input small").text(data.errors.username);
                            }
                            $('#collapse1 #loadingUmum').removeClass();
                            $('#collapse1 #loadingUmum').addClass('fa fa-close');
                        } else {
                            $("#collapse1 .form-group").removeClass('has-danger');
                            $("#collapse1 .form-group .input small").text("");
                            $("#collapse1 #loadingUmum").removeClass();
                        }
                    },
                });
            });
            </script>
            <form class="card shadow" action="{{ route('profil.settings.photo', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data" style="margin-bottom:20px;">
                <!-- <div class="card-header" role="tab" id="heading3"> -->
                    <a class="title" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse2">
                        Foto Profil
                    </a>
                <!-- </div> -->
                <div id="collapse3" class="collapse in padding-p-setting show" role="tabpanel" aria-labelledby="heading3">
                    {{ csrf_field() }}
                    <div class="card-block">
                        <div class="form-group text-xs-center">
                            <div class="image-editor" style="text-align:center !important;">
                                <input type="file" id="foto" name="photo" class="cropit-image-input">
                                <input type="hidden" id="filePhoto" name="img">
                                @if($user->foto != null)
                                <div class="cropit-preview" style="background: url({{ asset('storage/' . $user->foto) }})"></div>
                                @else
                                <div class="cropit-preview" style="background: url({{ asset('img/user.png') }}); background-size: cover; background-color: #dce6ec; "></div>
                                @endif
                                <div class="control-wrapper">
                                    <div class="button-control">
                                        <label for="foto" class="btn btn-sm el form-control-label color-primary"><i class="fa fa-picture-o" aria-hidden="true"></i></label>
                                        <span class="rotate-ccw el btn btn-sm"><i class="fa fa-undo" aria-hidden="true"></i></span>
                                        <span class="rotate-cw el btn btn-sm"><i class="fa fa-repeat" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="range-control">
                                        <input type="range" class="cropit-image-zoom-input el">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-xs-center" style="margin: 0 auto;width: 89px;">
                            <button type="button" id="btnFoto" class="btn btn-primary font-weight-bold">SIMPAN</button>
                            <i id="loadingPhoto" class="" style="font-size: 20px; vertical-align:middle; margin-left: 15px;"></i>
                        </div>
                    </div>
                </div>
            </form>
            <script>
            $(function() {
                $('.image-editor').cropit({
                    imageState: {
                        src: '{!! url('dist/img/avatar.png') !!}',
                    },
                });
                $('.rotate-cw').click(function() {
                    $('.image-editor').cropit('rotateCW');
                });
                $('.rotate-ccw').click(function() {
                    $('.image-editor').cropit('rotateCCW');
                });

                $("#btnFoto").click(function(){
                    var imageData = $('.image-editor').cropit('export');
                    $('input[name=img]').val(imageData);

                    $(window).ajaxStart(function(){
                        $('#collapse3 #loadingPhoto').removeClass();
                        $('#collapse2 #loadingPass').removeClass();
                        $('#collapse1 #loadingUmum').removeClass();
                        $('#collapse3 #loadingPhoto').addClass('fa fa-refresh fa-spin fa-3x fa-fw');
                    });

                    $(window).ajaxError(function(data){
                        alert("Terjadi Kesalahan " + data);
                        $('#collapse3 #loadingPhoto').removeClass();
                        $('#collapse2 #loadingPass').removeClass();
                        $('#collapse1 #loadingUmum').removeClass();
                        $('#collapse3 #loadingPhoto').addClass('fa fa-close');
                    });

                    $.ajax({
                        type    : "post",
                        url     : "{{ route('profil.settings.photo', ['id' => $user->id]) }}",
                        data    : {
                            '_token'  : $('#collapse3 input[name=_token]').val(),
                            'img'     : $("#filePhoto").val(),
                            'photo'   : $("#photo").val(),
                        },
                        success : function(data){
                            $('#collapse3 #loadingPhoto').removeClass();
                        },
                    });
                });
            });
            </script>
            <form class="card shadow" method="post" action="{{ route('profil.settings.pass', ['id' => $user->id]) }}" style="margin-bottom:20px;">
                <!-- <div class="card-header" role="tab" id="heading2"> -->
                    <a class="title" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                        Kata Sandi
                    </a>
                <!-- </div> -->
                <div id="collapse2" class="collapse in padding-p-setting show" role="tabpanel" aria-labelledby="heading2">
                    {{ csrf_field() }}
                    <div class="card-block">
                        <div id="oldPass" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Sandi Lama</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="password" name="oldPass">
                                <small></small>
                            </div>
                        </div>
                        <div id="newPass" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Sandi Baru</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="password" name="newPass">
                                <small></small>
                            </div>
                        </div>
                        <div id="newPass2" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Ulangi Sandi</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="password" name="newPass2">
                                <small></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label"></label>
                            <div class="col-xs-12 col-md-10">
                                <button type="button" id="btnPass" class="btn btn-primary font-weight-bold">SIMPAN</button>
                                <i id="loadingPass" style="font-size: 20px; vertical-align:middle; margin-left: 15px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
            // add function
            $("#btnPass").click(function() {
                $(window).ajaxStart(function(){
                    $('#collapse3 #loadingPhoto').removeClass();
                    $('#collapse2 #loadingPass').removeClass();
                    $('#collapse1 #loadingUmum').removeClass();
                    $('#collapse2 #loadingPass').addClass('fa fa-refresh fa-spin fa-3x fa-fw');
                });
                $.ajax({
                    type: 'post',
                    url: "{{ route('profil.settings.pass', ['id' => $user->id]) }}",
                    data: {
                        '_token'  : $('#collapse2 input[name=_token]').val(),
                        'oldPass' : $("#oldPass input").val(),
                        'newPass' : $("#newPass input").val(),
                        'newPass2': $("#newPass2 input").val()
                    },
                    success: function(data) {
                        $("#collapse2 .form-group").removeClass('has-danger');
                        $("#collapse2 .form-group .input small").text("");
                        $('#loadingPass').removeClass();
                        if (data.errors) {
                            if(data.errors.oldPass){
                                $("#oldPass").addClass("has-danger");
                                $("#oldPass .input input").addClass("form-control-danger");
                                $("#oldPass .input small").text(data.errors.oldPass);
                            }
                            if(data.errors.newPass){
                                $("#newPass").addClass("has-danger");
                                $("#newPass .input input").addClass("form-control-danger");
                                $("#newPass .input small").text(data.errors.newPass);
                            }
                            if(data.errors.newPass2){
                                $("#newPass2").addClass("has-danger");
                                $("#newPass2 .input input").addClass("form-control-danger");
                                $("#newPass2 .input small").text(data.errors.newPass2);
                            }
                            $('#loadingPass').removeClass();
                            $('#loadingPass').addClass('fa fa-close');
                        }
                        else if(data.error == 1){
                            $("#oldPass").addClass("has-danger");
                            $("#oldPass .input input").addClass("form-control-danger");
                            $("#oldPass .input small").text(data.message);
                        }
                        else if(data.error == 2){
                            $("#newPass2").addClass("has-danger");
                            $("#newPass2 .input input").addClass("form-control-danger");
                            $("#newPass2 .input small").text(data.message);
                        }
                        else {
                            $("#collapse2 .form-group").removeClass('has-danger');
                            $("#collapse2 .form-group .input small").text("");
                            $('#loadingPass').removeClass();
                        }
                    },
                });
            });
            </script>
        </div>
    </div>
</div>
@endsection('content')
