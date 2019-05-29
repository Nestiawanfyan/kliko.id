@extends('layouts.user')

@section('title')
Pengaturan Profil
@endsection('title')

@section('head-style')
<link rel="stylesheet" href="{{ asset('dist/css/dropzone.min.css') }}">
@endsection('head-style')

@section('head-script')
<script src="{{ asset('dist/js/dropzone.js') }}"></script>
@endsection('head-script')

@section('script')
<!-- <script type="text/javascript" src="{{ asset('dist/js/editValidation.js') }}"></script> -->
<script type="text/javascript">
function handleError(e, b, m){
    $(e).addClass("has-danger");
    $(e + " .input input").addClass("form-control-danger");
    $(e + " .input small").text(m);
    $(b).attr("disabled", "disabled");
}
function validationSuccess(e, b){
    $(e).removeClass("has-danger");
    $(e + " .input input").removeClass("form-control-danger");
    $(e + " .input small").text("");
    $(b).removeAttr("disabled");
}
function cek(cek, btn){
    for(i = 0; i < cek.length; i++){
        if(cek[i] == 0) {
            $(btn).attr("disabled", "disabled");
        }
    }
}

//---------------------PEMILIK---------------------------
var namaPemilik   = $("#namaPemilik input");
var telpPemilik   = $("#telpPemilik input");
var alamatPemilik = $("#alamatPemilik input");
var btnPemilik    = $("#btnPemilik");
var cekPemilik = [0,0,1];    // 0 == Error, 1 == Success
$(document).ready(function(){
    if(namaPemilik.val() != ""){
        namaPemilik.trigger("keyup");
    }
    if(telpPemilik.val() != ""){
        telpPemilik.trigger("keyup");
    }
    if(alamatPemilik.val() != ""){
        alamatPemilik.trigger("keyup");
    }
});

namaPemilik.keyup(function(){
    var re = /^[a-zA-Z\ ]+$/;
    if(namaPemilik.val() == null || namaPemilik.val() == ""){
        handleError("#namaPemilik", "#btnPemilik", "Tidak Boleh Kosong");
        cekPemilik[0] = 0;
    }
    else if(!re.test(namaPemilik.val())) {
        handleError("#namaPemilik", "#btnPemilik", "Gunakan huruf.");
        cekPemilik[0] = 0;
    }
    else {
        validationSuccess("#namaPemilik", "#btnPemilik");
        cekPemilik[0] = 1;
    }
    cek(cekPemilik, "#btnPemilik");
});

telpPemilik.keyup(function(){
    var re = /^[0-9]{6,15}$/;
    if(telpPemilik.val() == null || telpPemilik.val() == ""){
        handleError("#telpPemilik", "#btnPemilik", "Tidak Boleh Kosong");
        cekPemilik[1] = 0;
    }
    else if(!re.test(telpPemilik.val())) {
        handleError("#telpPemilik", "#btnPemilik", "Gunakan angka (6 - 15 karakter)");
        cekPemilik[1] = 0;
    }
    else {
        validationSuccess("#telpPemilik", "#btnPemilik");
        cekPemilik[1] = 1;
    }
    cek(cekPemilik, "#btnPemilik");
});

$(function(){
    btnPemilik.click(function(){
        $(window).ajaxStart(function(){
            btnPemilik.html("<i style='font-size: 18px;'></i>");
            $('#btnPemilik i').addClass('fa fa-refresh fa-spin fa-3x fa-fw');
        });
        $(window).ajaxComplete(function(){
            $('#btnPemilik').html("Simpan");
        });
        $.ajax({
            type  : 'post',
            url   : "{{ route('edit.pemilik', ['id' => $kost->id]) }}",
            data  : {
                '_token'  : $('#collapsePemilik input[name=_token]').val(),
                'namaPemilik'     : namaPemilik.val(),
                'alamatPemilik'   : alamatPemilik.val(),
                'telpPemilik'     : telpPemilik.val()
            },
            success: function(data) {
                if (data.errors)
                alert("Terjadi Kesalahan");
                $('#btnPemilik').html("Simpan");
            },
            error: function(data) {
                alert("Terjadi Kesalahan");
            },
        });
    });
});


//---------------------KOST--------------------------
var namaKost      = $("#namaKost input");
var telpKost      = $("#telpKost input");
var alamatKost    = $("#alamatKost input");
var kodePos       = $("#kodePos input");
var luasKamar     = $("#luasKamar input");
var jumlahKamar   = $("#jumlahKamar input");
var kamarKosong   = $("#kamarKosong input");
var penghuniKost  = $("#penghuniKost input");
var latitudeKost  = $("input[name=latitude]");
var longitudeKost = $("input[name=longitude]");
var btnKost       = $("#btnKost");
var cekKost = [0,1,0,1,0,0,0,1];    // 0 == Error, 1 == Success
$(document).ready(function(){
    if(namaKost.val() != ""){
        namaKost.trigger("keyup");
    }
    if(telpKost.val() != ""){
        telpKost.trigger("keyup");
    }
    if(alamatKost.val() != ""){
        alamatKost.trigger("keyup");
    }
    if(kodePos.val() != ""){
        kodePos.trigger("keyup");
    }
    if(luasKamar.val() != ""){
        luasKamar.trigger("keyup");
    }
    if(jumlahKamar.val() != ""){
        jumlahKamar.trigger("keyup");
    }
    if(kamarKosong.val() != ""){
        kamarKosong.trigger("keyup");
    }
});


namaKost.keyup(function(){
    var re = /^[a-zA-Z0-9\ ]+$/;
    if(namaKost.val() == null || namaKost.val() == ""){
        handleError("#namaKost", "#btnKost", "Tidak Boleh Kosong");
        cekKost[0] = 0;
    }
    else if(!re.test(namaKost.val())) {
        handleError("#namaKost", "#btnKost", "Gunakan huruf.");
        cekKost[0] = 0;
    }
    else {
        validationSuccess("#namaKost", "#btnKost");
        cekKost[0] = 1;
    }
    cek(cekKost, "#btnKost");
});

telpKost.keyup(function(){
    var re = /^[0-9]{6,15}$/;
    if(telpKost.val() != ""){
        if(!re.test(telpKost.val())) {
            handleError("#telpKost", "#btnKost", "Gunakan angka (6 - 15 karakter)");
            cekKost[1] = 0;
        }
        else {
            validationSuccess("#telpKost", "#btnKost");
            cekKost[1] = 1;
        }
    }
    else {
        validationSuccess("#telpKost", "#btnKost");
        cekKost[1] = 1;
    }
    cek(cekKost, "#btnKost");
});

alamatKost.keyup(function(){
    if(alamatKost.val() == null || alamatKost.val() == ""){
        handleError("#alamatKost", "#btnKost", "Gunakan angka (6 - 15 karakter)");
        cekKost[2] = 0;
    }
    else {
        validationSuccess("#alamatKost", "#btnKost");
        cekKost[2] = 1;
    }
    cek(cekKost, "#btnKost");
});

kodePos.keyup(function(){
    var re = /^[0-9]{5}$/;
    if(kodePos.val() != null && kodePos.val() != ""){
        handleError("#kodePos", "#btnKost", "Gunakan 5 Angka saja untuk kode pos");
        if(!re.test(kodePos.val())) {
            handleError("#kodePos", "#btnKost", "Gunakan angka (6 - 15 karakter)");
            cekKost[3] = 0;
        }
        else {
            validationSuccess("#kodePos", "#btnKost");
            cekKost[3] = 1;
        }
    }
    else {
        validationSuccess("#kodePos", "#btnKost");
        cekKost[3] = 1;
    }
    cek(cekKost, "#btnKost");
});

luasKamar.keyup(function(){
    var re = /^([0-9]+)\x([0-9]+)$/;
    if(luasKamar.val() == null || luasKamar.val() == ""){
        handleError("#luasKamar", "#btnKost", "Tidak Boleh Kosong");
        cekKost[4] = 0;
    }
    else if(!re.test(luasKamar.val())) {
        handleError("#luasKamar", "#btnKost", "Penulisan luas kamar (contoh: 4x3)");
        cekKost[4] = 0;
    }
    else {
        validationSuccess("#luasKamar", "#btnKost");
        cekKost[4] = 1;
    }
    cek(cekKost, "#btnKost");
});

jumlahKamar.keyup(function(){
    var re = /^[0-9]+$/;
    if(jumlahKamar.val() == null || jumlahKamar.val() == ""){
        handleError("#jumlahKamar", "#btnKost", "Tidak Boleh Kosong");
        cekKost[5] = 0;
    }
    else if(!re.test(jumlahKamar.val())) {
        handleError("#jumlahKamar", "#btnKost", "Gunakan Angka (0 - tak terhingga)");
        cekKost[5] = 0;
    }
    else {
        validationSuccess("#jumlahKamar", "#btnKost");
        cekKost[5] = 1;
    }
    cek(cekKost, "#btnKost");
});

kamarKosong.keyup(function(){
    var re = /^[0-9]+$/;
    if(kamarKosong.val() == null || kamarKosong.val() == ""){
        handleError("#kamarKosong", "#btnKost", "Tidak Boleh Kosong");
        cekKost[6] = 0;
    }
    else if(!re.test(kamarKosong.val())) {
        handleError("#kamarKosong", "#btnKost", "Gunakan Angka (0 - tak terhingga)");
        cekKost[6] = 0;
    }
    else {
        if(parseInt(jumlahKamar.val()) < parseInt(kamarKosong.val())) {
            handleError("#kamarKosong", "#btnKost", "Kamar kosong tidak bisa melebihi jumlah kamar.");
            cekKost[6] = 0;
        }
        else {
            validationSuccess("#kamarKosong", "#btnKost");
            cekKost[6] = 1;
        }
    }
    cek(cekKost, "#btnKost");
});

var valuePenghuni = "{!! $kost->penghuni !!}";
$(function(){
    $("#penghuniP").click(function(){
        valuePenghuni = "Putra";
    });
    $("#penghuniW").click(function(){
        valuePenghuni = "Putri";
    });
    $("#penghuniC").click(function(){
        valuePenghuni = "Campur";
    });
});


$(function(){
    btnKost.click(function(){
        $(window).ajaxStart(function(){
            btnKost.html("<i style='font-size: 18px;'></i>");
            $('#btnKost i').addClass('fa fa-refresh fa-spin fa-3x fa-fw');
        });
        $(window).ajaxComplete(function(){
            $('#btnKost').html("Simpan");
        });
        $.ajax({
            type  : 'post',
            url   : "{{ route('edit.kost', ['id' => $kost->id]) }}",
            data  : {
                '_token'      : $('#collapseKost input[name=_token]').val(),
                'namaKost'    : namaKost.val(),
                'telpKost'    : telpKost.val(),
                'alamatKost'  : alamatKost.val(),
                'kodePos'     : kodePos.val(),
                'luasKamar'   : luasKamar.val(),
                'jumlahKamar' : jumlahKamar.val(),
                'kamarKosong' : kamarKosong.val(),
                'penghuniKost': valuePenghuni,
                'latitude'    : latitudeKost.val(),
                'longitude'   : longitudeKost.val(),
            },
            success: function(data) {
                if (data.errors)
                alert(data);
                $('#btnKost').html("Simpan");
            },
            error: function(data) {
                alert("Terjadi Kesalahan");
            },
        });
    });
});



//---------------------PEMILIK---------------------------
var sewaHari    = $("#sewaHari input");
var sewaMinggu  = $("#sewaMinggu input");
var sewaBulan   = $("#sewaBulan input");
var sewaTahun   = $("#sewaTahun input");
var btnSewa     = $("#btnSewa");
var cekSewa     = [0,0,0,0];    // 0 == Error, 1 == Success
$(document).ready(function(){
    if(sewaHari.val() != ""){
        sewaHari.trigger("keyup");
    }
    if(sewaMinggu.val() != ""){
        sewaMinggu.trigger("keyup");
    }
    if(sewaBulan.val() != ""){
        sewaBulan.trigger("keyup");
    }
    if(sewaTahun.val() != ""){
        sewaTahun.trigger("keyup");
    }
});

sewaHari.keyup(function(){
    var re = /^[0-9]+$/;
    if(sewaHari.val() != null && sewaHari.val() != ""){
        handleError("#sewaHari", "#btnSewa", "Tidak Boleh Kosong");
        if(!re.test(sewaHari.val())) {
            handleError("#sewaHari", "#btnSewa", "Masukkkan anggka saja.");
            cekSewa[0] = 0;
        }
        else {
            validationSuccess("#sewaHari", "#btnSewa");
            cekSewa[0] = 1;
        }
    }
    else {
        validationSuccess("#sewaHari", "#btnSewa");
        cekSewa[0] = 1;
    }
    (cek(cekSewa, "#btnSewa"));
});

sewaMinggu.keyup(function(){
    var re = /^[0-9]+$/;
    if(sewaMinggu.val() != null && sewaMinggu.val() != ""){
        handleError("#sewaMinggu", "#btnSewa", "Tidak Boleh Kosong");
        if(!re.test(sewaMinggu.val())) {
            handleError("#sewaMinggu", "#btnSewa", "Masukkkan anggka saja.");
            cekSewa[1] = 0;
        }
        else {
            validationSuccess("#sewaMinggu", "#btnSewa");
            cekSewa[1] = 1;
        }
    }
    else {
        validationSuccess("#sewaMinggu", "#btnSewa");
        cekSewa[1] = 1;
    }
    cek(cekSewa, "#btnSewa");
});

sewaBulan.keyup(function(){
    var re = /^[0-9]+$/;
    if(sewaBulan.val() != null && sewaBulan.val() != ""){
        handleError("#sewaBulan", "#btnSewa", "Tidak Boleh Kosong");
        if(!re.test(sewaBulan.val())) {
            handleError("#sewaBulan", "#btnSewa", "Masukkkan anggka saja.");
            cekSewa[2] = 0;
        }
        else {
            validationSuccess("#sewaBulan", "#btnSewa");
            cekSewa[2] = 1;
        }
    }
    else {
        validationSuccess("#sewaBulan", "#btnSewa");
        cekSewa[2] = 1;
    }
    cek(cekSewa, "#btnSewa");
});

sewaTahun.keyup(function(){
    var re = /^[0-9]+$/;
    if(sewaTahun.val() == null && sewaTahun.val() == ""){
        handleError("#sewaTahun", "#btnSewa", "Tidak Boleh Kosong");
        cekSewa[3] = 0;
    }
    else if(!re.test(sewaTahun.val())) {
        handleError("#sewaTahun", "#btnSewa", "Masukkkan anggka saja.");
        cekSewa[3] = 0;
    }
    else {
        validationSuccess("#sewaTahun", "#btnSewa");
        cekSewa[3] = 1;
    }
    cek(cekSewa, "#btnSewa");
});

$(function(){
    btnSewa.click(function(){
        $(window).ajaxStart(function(){
            btnSewa.html("<i style='font-size: 18px;'></i>");
            $('#btnSewa i').addClass('fa fa-refresh fa-spin fa-3x fa-fw');
        });
        $(window).ajaxComplete(function(){
            $('#btnPemilik').html("Simpan");
        });
        $.ajax({
            type  : 'post',
            url   : "{{ route('edit.sewa', ['id' => $kost->id]) }}",
            data  : {
                '_token'  : $('#collapseSewa input[name=_token]').val(),
                'sewaHari'     : sewaHari.val(),
                'sewaMinggu'   : sewaMinggu.val(),
                'sewaBulan'    : sewaBulan.val(),
                'sewaTahun'    : sewaTahun.val(),
            },
            success: function(data) {
                if (data.errors)
                alert("Terjadi Kesalahan");
                $('#btnSewa').html("Simpan");
            },
            error: function(data) {
                alert("Terjadi Kesalahan-1");
            },
        });
    });
});


var valFK   = [];
var valFU   = [];
var valFL   = [];
var valFKM  = [];
var parkir  = [];

$(function(){
    $("#btnFasilitas").click(function(){
        valFK = $('#fKhusus input:checked').map(function(_, el) {
            return $(el).val();
        }).get();
        valFU = $('#fUmum input:checked').map(function(_, el) {
            return $(el).val();
        }).get();
        valFL = $('#fLingkungan input:checked').map(function(_, el) {
            return $(el).val();
        }).get();
        valFKM = $('#fKamarMandi input:checked').map(function(_, el) {
            return $(el).val();
        }).get();
        parkir = $('#parkir input:checked').map(function(_, el) {
            return $(el).val();
        }).get();
        $(window).ajaxStart(function(){
            $("#btnFasilitas").html("<i style='font-size: 18px;'></i>");
            $('#btnFasilitas i').addClass('fa fa-refresh fa-spin fa-3x fa-fw');
        });
        $(window).ajaxComplete(function(){
            $('#btnFasilitas').html("Simpan");
        });
        $.ajax({
            type  : 'post',
            url   : "{{ route('edit.fasilitas', ['id' => $kost->id]) }}",
            data  : {
                '_token'          : $('#collapseFasilitas input[name=_token]').val(),
                'fKhusus'         : valFK,
                'fKhususLain'     : $('#collapseFasilitas textarea[name=fKhususLain]').val(),
                'fUmum'           : valFU,
                'fUmumLain'       : $('#collapseFasilitas textarea[name=fUmumLain]').val(),
                'fLingkungan'     : valFL,
                'fLingkunganLain' : $('#collapseFasilitas textarea[name=fLingkunganLain]').val(),
                'fKamarMandi'     : valFKM,
                'fMandiLain'      : $('#collapseFasilitas textarea[name=fMandiLain]').val(),
                'parkir'          : parkir,
                'catatan'         : $('#collapseFasilitas textarea[name=catatan]').val(),
            },
            success: function(data) {
                if (data.errors)
                alert("Terjadi Kesalahan");
                $('#btnFasilitas').html("Simpan");
            },
            error: function(data) {
                alert("Terjadi Kesalahan");
            },
        });
    });
});
</script>
@endsection

@section('content')

<!-- <div class="pageheader small text-xs-center"> -->
    <!-- <div class="tttt"> -->
        <div class="container" style="margin-top:40px;font-family: 'Didact Gothic', sans-serif;">
            <div class="row">
                <div class="col-xs-12 title-wrap">
                    <h1 class="title-web" style="color:#6f1994;">Edit Kost : {{ $kost->namaKost }}</h1>
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
        <div class="col-md-9">

            <form class="card shadow" method="post" action="{{ route('edit.pemilik', ['id' => $kost->id]) }}" style="margin-bottom:20px;">
                <!-- <div class="card-header" role="tab" id="headingPemilik"> -->
                    <a class="title" data-toggle="collapse" data-parent="#accordion" href="#collapsePemilik" aria-expanded="true" aria-controls="collapse1">
                        Pemilik/Pengelola Kost
                    </a>
                <!-- </div> -->
                <div id="collapsePemilik" class="collapse in show padding-p-setting" role="tabpanel" aria-labelledby="headingPemilik">
                    <div class="card-block">
                        {{ csrf_field() }}
                        <div id="namaPemilik" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Nama</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="namaPemilik" value="{{ $kost->namaPemilik }}">
                                <small></small>
                            </div>
                        </div>
                        <div id="telpPemilik" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">No HP</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="telpPemilik" value="{{ $kost->telpPemilik }}">
                                <small></small>
                            </div>
                        </div>
                        <div id="alamatPemilik" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Alamat</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="alamatPemilik" value="{{ $kost->alamatPemilik }}">
                                <small></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label"></label>
                            <div class="col-xs-12 col-md-10 input">
                                <button type="button" id="btnPemilik" class="btn btn-primary btn-sm font-weight-bold float-right">Simpan</button>
                                <i id="loadingPemilik" class="" style="font-size: 20px; vertical-align:middle; margin-left: 15px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form class="card shadow" method="post" action="{{ route('edit.kost', ['id' => $kost->id]) }}" style="margin-bottom:20px;">
                <!-- <div class="card-header" role="tab" id="headingKost"> -->
                    <a class="title" data-toggle="collapse" data-parent="#accordion" href="#collapseKost" aria-expanded="true" aria-controls="collapse1">
                        Informasi Kost
                    </a>
                <!-- </div> -->
                <div id="collapseKost" class="collapse in show padding-p-setting" role="tabpanel" aria-labelledby="headingKost">
                    {{ csrf_field() }}
                    <div class="card-block">
                        <div id="namaKost" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-labelel">Nama</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="namaKost" value="{{ $kost->namaKost }}">
                                <small></small>
                            </div>
                        </div>
                        <div id="telpKost" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-labelel">No HP</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="telpKost" value="{{ $kost->telpKost }}">
                                <small></small>
                            </div>
                        </div>
                        <div id="alamatKost" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-labelel">Alamat</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="alamatKost" value="{{ $kost->alamatKost }}">
                                <small></small>
                            </div>
                        </div>
                        <div id="kodePos" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-labelel">Kode Pos</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="kodePos" value="{{ $kost->posKost }}">
                                <small></small>
                            </div>
                        </div>
                        <div id="luasKamar" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-labelel">Luas Kamar</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="luasKamar" value="{{ $kost->luasKamar }}">
                                <small></small>
                            </div>
                        </div>
                        <div id="jumlahKamar" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-labelel">Jumlah Kamar</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="jumlahKamar" value="{{ $kost->jumlahKamar }}">
                                <small></small>
                            </div>
                        </div>
                        <div id="kamarKosong" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-labelel">Kamar Kosong</label>
                            <div class="col-xs-12 col-md-10 input">
                                <input class="form-control" type="text" name="kamarKosong" value="{{ $kost->kamarKosong }}">
                                <small></small>
                            </div>
                        </div>
                        <div id="penghuniKost" class="form-group row">
                            <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-labelel">Penghuni</label>
                            <div class="col-xs-12 col-md-10 input">
                                <div class="row">
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-radio">
                                            <input name="penghuniKost" id="penghuniP" type="radio" value="p" {{ $kost->penghuni == "Putra" ? 'checked' : ''}}>
                                            <span class="c-indicator"></span>
                                            Putra
                                        </label>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-radio">
                                            <input name="penghuniKost" id="penghuniW" type="radio" value="w" {{ $kost->penghuni == "Putri" ? 'checked' : ''}}>
                                            <span class="c-indicator"></span>
                                            Putri
                                        </label>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-radio">
                                            <input name="penghuniKost" id="penghuniC" type="radio" value="c" {{ $kost->penghuni == "Campur" ? 'checked' : ''}}>
                                            <span class="c-indicator"></span>
                                            Campur
                                        </label>
                                    </div>
                                </div>
                                <small></small>
                            </div>
                        </div>
                        <div id="mapKost" class="form-group" style="padding-bottom:0;">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <input id="maps-input" type="text" placeholder="Tulis Nama Tempat, Kampus, Sekolah, dll">
                                    <div id="map_canvas"></div>
                                    <div class="row latlng">
                                    <div class="col-6">
                                                <span>Latitude</span><br>
                                                <input name="latitude" class="MapLat form-control" value="{{ $kost->latitude }}" type="text">
                                            </div>
                                            <div class="col-6">
                                                <span>Longitude</span><br>                                         
                                                <input name="longitude" class="MapLon form-control" value="{{ $kost->longitude }}" type="text">
                                            </div>
                                            <input  class="MapLat latlng form-control col-xs-6 col-md-4 disabled" value="{{ $kost->latitude }}" type="hidden">
                                            <input  class="MapLon latlng form-control col-xs-6 col-md-4 disabled" value="{{ $kost->longitude }}" type="hidden">
                                    </div>
                                </div>
                            </div>
                            <script>
                            $(function () {
                                var lat = {!! $kost->latitude !!},
                                lng = {!! $kost->longitude !!},
                                latlng = new google.maps.LatLng(lat, lng),
                                image = '{{ URL::to('img/icon.png') }}';
                                //zoomControl: true,
                                //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,
                                var mapOptions = {
                                    center: new google.maps.LatLng(lat, lng),
                                    zoom: 16,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                                    panControl: true,
                                    panControlOptions: {
                                        position: google.maps.ControlPosition.TOP_RIGHT
                                    },
                                    zoomControl: true,
                                    zoomControlOptions: {
                                        style: google.maps.ZoomControlStyle.LARGE,
                                        position: google.maps.ControlPosition.TOP_left
                                    }
                                },
                                map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
                                marker = new google.maps.Marker({
                                    position: latlng,
                                    map: map,
                                    icon: image,
                                    draggable: true
                                });
                                var input = document.getElementById('maps-input');
                                var autocomplete = new google.maps.places.Autocomplete(input);
                                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                                autocomplete.bindTo('bounds', map);
                                var infowindow = new google.maps.InfoWindow();
                                google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
                                    infowindow.close();
                                    var place = autocomplete.getPlace();
                                    if (place.geometry.viewport) {
                                        map.fitBounds(place.geometry.viewport);
                                    } else {
                                        map.setCenter(place.geometry.location);
                                        map.setZoom(17);
                                    }
                                    moveMarker(place.name, place.geometry.location);
                                    $('.MapLat').val(place.geometry.location.lat());
                                    $('.MapLon').val(place.geometry.location.lng());
                                });
                                google.maps.event.addListener(marker, 'drag', function (event) {
                                    $('.MapLat').val(event.latLng.lat());
                                    $('.MapLon').val(event.latLng.lng());
                                    /*
                                    infowindow.close();
                                    var geocoder = new google.maps.Geocoder();
                                    geocoder.geocode({
                                    "latLng":event.latLng
                                }, function (results, status) {
                                console.log(results, status);
                                if (status == google.maps.GeocoderStatus.OK) {
                                console.log(results);
                                var lat = results[0].geometry.location.lat(),
                                lng = results[0].geometry.location.lng(),
                                placeName = results[0].address_components[0].long_name,
                                latlng = new google.maps.LatLng(lat, lng);
                                moveMarker(placeName, latlng);
                                $("#maps-input").val(results[0].formatted_address);
                            }
                        });*/
                    });

                    function moveMarker(placeName, latlng) {
                        marker.setIcon(image);
                        marker.setPosition(latlng);
                        infowindow.setContent(placeName);
                        //infowindow.open(map, marker);
                    }
                });
                </script>
            </div>
            <div class="form-group row">
                <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label"></label>
                <div class="col-xs-12 col-md-10 input">
                    <button type="button" id="btnKost" disabled class="btn btn-primary btn-sm font-weight-bold float-right">Simpan</button>
                    <i id="loadingKost" class="" style="font-size: 20px; vertical-align:middle; margin-left: 15px;"></i>
                </div>
            </div>
        </div>
    </div>
</form>

<form class="card shadow" method="post" action=""  style="margin-bottom:20px;">
    <!-- <div class="card-header" role="tab" id="headingSewa"> -->
        <a class="title" data-toggle="collapse" data-parent="#accordion" href="#collapseSewa" aria-expanded="true" aria-controls="collapse1">
            Harga Sewa
        </a>
    <!-- </div> -->
    <div id="collapseSewa" class="collapse in padding-p-setting show" role="tabpanel" aria-labelledby="headingSewa">
        {{ csrf_field() }}
        <div class="card-block">
            <!-- <div id="sewaMin" class="form-group row">
                <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Sewa Minimal</label>
                <div class="col-xs-10 input">
                    <select class="c-select" name="sewaMin" requiresd="">
                        @for($i = 1; $i<=12; $i++)
                        <option value="{{ $i }}" {{ $kost->sewaMin == $i ? 'selected' : '' }}>{{ $i }} Bulan</option>
                        @endfor
                    </select>
                    <small></small>
                </div>
            </div> -->
            <div id="sewaHari" class="form-group row">
                <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Harian</labe l>
                <div class="col-xs-12 col-md-10 input">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp. </span>
                        <input type="text" value="{{ $kost->sewaHari }}" class="form-control" name="sewaHari" placeholder="50000" aria-describedby="basic-addon1">
                    </div>
                    <small></small>
                </div>
            </div>
            <div id="sewaMinggu" class="form-group row">
                <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Mingguan</label>
                <div class="col-xs-12 col-md-10 input">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp. </span>
                        <input type="text" value="{{ $kost->sewaMinggu }}" class="form-control" name="sewaMinggu" placeholder="50000" aria-describedby="basic-addon1">
                    </div>
                    <small></small>
                </div>
            </div>
            <div id="sewaBulan" class="form-group row">
                <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Bulanan</label>
                <div class="col-xs-12 col-md-10 input">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp. </span>
                        <input type="text" value="{{ $kost->sewaBulan }}" class="form-control" name="sewaBulan" placeholder="50000" aria-describedby="basic-addon1">
                    </div>
                    <small></small>
                </div>
            </div>
            <div id="sewaTahun" class="form-group row">
                <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label">Tahunan</label>
                <div class="col-xs-12 col-md-10 input">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp. </span>
                        <input type="text" value="{{ $kost->sewaTahun }}" class="form-control" name="sewaTahun" placeholder="50000" aria-describedby="basic-addon1">
                    </div>
                    <small></small>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xs-12 col-md-2 text-xs-left text-md-right form-control-label"></label>
                <div class="col-xs-12 col-md-10 input">
                    <button type="button" id="btnSewa" disabled class="btn btn-primary btn-sm font-weight-bold float-right">Simpan</button>
                    <i id="loadingPemilik" class="" style="font-size: 20px; vertical-align:middle; margin-left: 15px;"></i>
                </div>
            </div>
        </div>
    </div>
</form>

<form class="card shadow" method="post" action="{{ route('edit.fasilitas', ['id' => $kost->id]) }}" style="margin-bottom:20px;">
    <!-- <div class="card-header" role="tab" id="headingFasilitas"> -->
        <a class="title" data-toggle="collapse" data-parent="#accordion" href="#collapseFasilitas" aria-expanded="true" aria-controls="collapse1">
            Fasilitas
        </a>
    <!-- </div> -->
    <div id="collapseFasilitas" class="collapse in padding-p-setting show" role="tabpanel" aria-labelledby="headingFasilitas">
        {{ csrf_field() }}
        <div class="card-block">
            <div class="form-group" id="fasilitas">
                <div class="row">
                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                        Fasilitas Khusus<br>
                    </label>
                    <div class="col-xs-12 col-md-9">
                        <div class="row">
                            <div class="col-xs-6 col-md-4">
                                <label class="c-input c-checkbox">
                                    @foreach($fasilitas->where('id_kategori', 1) as $data)
                                        <?php $check = false; ?>
                                        @foreach($kost->fasilitas_kost as $fakost)
                                            @if($data->id == $fakost->id_fasilitas)
                                                <?php $check = true; ?>
                                            @endif
                                        @endforeach
                                        <input type="checkbox" name="fasilitase[]" value="{{ $data->id }}" {{ $check ? "checked" : "" }}><span class="c-indicator">{{ $data->nama }}</span>
                                    @endforeach                                     
                                        <div class="row fas-lain">
                                            <div class="col-xs-12">
                                                <label>Fasilitas Khusus Lainnya</label>
                                                <small>(Pisahkan dengan tanda koma ",")</small>
                                                <textarea class="form-control" name="f-khusus" rows="3">{{ $kost->fKhusus }}</textarea>
                                            </div>
                                        </div>
                                </label>
                            </div>
                        </div>
                    </div>

                        <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                        Fasilitas Kamar Mandi<br>
                        </label>
                        <div class="col-xs-12 col-md-9">
                            <div class="row">
                                <div class="col-xs-6 col-md-4">
                                    <label class="c-input c-checkbox">
                                        @foreach($fasilitas->where('id_kategori', 2) as $data)
                                            <?php $check = false; ?>
                                            @foreach($kost->fasilitas_kost as $fakost)
                                                @if($data->id == $fakost->id_fasilitas)
                                                    <?php $check = true; ?>
                                                @endif
                                            @endforeach
                                            <input type="checkbox" name="fasilitase[]" value="{{ $data->id }}" {{ $check ? "checked" : "" }}><span class="c-indicator">{{ $data->nama }}</span>
                                        @endforeach 
                                        <div class="row fas-lain">
                                            <div class="col-xs-12">
                                                <label>Fasilitas Khusus Lainnya</label>
                                                <small>(Pisahkan dengan tanda koma ",")</small>
                                                <textarea class="form-control" name="f-khusus" rows="3">{{ $kost->fKamarMandi }}</textarea>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                            Fasilitas Lingkungan<br>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-checkbox">
                                            @foreach($fasilitas->where('id_kategori', 3) as $data)
                                                <?php $check = false; ?>
                                                @foreach($kost->fasilitas_kost as $fakost)
                                                    @if($data->id == $fakost->id_fasilitas)
                                                        <?php $check = true; ?>
                                                    @endif
                                                @endforeach
                                                <input type="checkbox" name="fasilitase[]" value="{{ $data->id }}" {{ $check ? "checked" : "" }}><span class="c-indicator">{{ $data->nama }}</span>
                                            @endforeach 
                                            <div class="row fas-lain">
                                                <div class="col-xs-12">
                                                    <label>Fasilitas Khusus Lainnya</label>
                                                    <small>(Pisahkan dengan tanda koma ",")</small>
                                                    <textarea class="form-control" name="f-khusus" rows="3">{{ $kost->fLingkungan }}</textarea>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                            Fasilitas Umum<br>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-checkbox">
                                            @foreach($fasilitas->where('id_kategori', 5) as $data)
                                                <?php $check = false; ?>
                                                @foreach($kost->fasilitas_kost as $fakost)
                                                    @if($data->id == $fakost->id_fasilitas)
                                                        <?php $check = true; ?>
                                                    @endif
                                                @endforeach
                                                <input type="checkbox" name="fasilitase[]" value="{{ $data->id }}" {{ $check ? "checked" : "" }}><span class="c-indicator">{{ $data->nama }}</span>
                                            @endforeach 
                                            <div class="row fas-lain">
                                            <div class="col-xs-12">
                                                <label>Fasilitas Khusus Lainnya</label>
                                                <small>(Pisahkan dengan tanda koma ",")</small>
                                                <textarea class="form-control" name="f-khusus" rows="3">{{ $kost->fUmum }}</textarea>
                                            </div>
                                        </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                            Fasilitas Ruangan<br>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-checkbox">
                                            @foreach($fasilitas->where('id_kategori', 4) as $data)
                                                <?php $check = false; ?>
                                                @foreach($kost->fasilitas_kost as $fakost)
                                                    @if($data->id == $fakost->id_fasilitas)
                                                        <?php $check = true; ?>
                                                    @endif
                                                @endforeach
                                                <input type="checkbox" name="fasilitase[]" value="{{ $data->id }}" {{ $check ? "checked" : "" }}><span class="c-indicator">{{ $data->nama }}</span>
                                            @endforeach 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                            Fasilitas Parkir<br>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-checkbox">
                                            @foreach($fasilitas->where('id_kategori', 6) as $data)
                                                <?php $check = false; ?>
                                                @foreach($kost->fasilitas_kost as $fakost)
                                                    @if($data->id == $fakost->id_fasilitas)
                                                        <?php $check = true; ?>
                                                    @endif
                                                @endforeach
                                                <input type="checkbox" name="fasilitase[]" value="{{ $data->id }}" {{ $check ? "checked" : "" }}><span class="c-indicator">{{ $data->nama }}</span>
                                            @endforeach 
                                        </label>
                                    </div>
                                </div>
                            </div>

                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-md-9">
                                <button type="submit" style="background-color:#6f1994;border:1px solid #6f1994;" class="btn btn-primary float-right">Tambah Baru</button>
                            </div>
                        </div>
                    </div> -->

                    <div class="">
                        <div class="col-xs-12 flaot-right">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

                <form class="card shadow" method="post" action="{{ route('edit.pemilik', ['id' => $kost->id]) }}" style="margin-bottom:20px;">
                    <!-- <div class="card-header" role="tab" id="headingFoto"> -->
                        <a class="title" data-toggle="collapse" data-parent="#accordion" href="#collapseFoto" aria-expanded="true" aria-controls="collapse1">
                            Foto Kost
                        </a>
                    <!-- </div> -->
                    <div id="collapseFoto" class="collapse in show padding-p-setting" role="tabpanel" aria-labelledby="headingFoto">
                        <div class="card-block">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="alert alert-info">
                                        Type File Gambar <strong>JPG, PNG</strong><br>
                                        Maksimal <strong>2 MB</strong><br>
                                        Maksimal <strong>5 Gambar</strong><br>
                                        Gambar Pertama Akan Dijadikan <strong>Cover</strong><br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12" id="notif"></div>
                            </div>
                            <div id="namaPemilik" class="form-group row">
                                <div class="col-xs-12 w-100">
                                <style media="screen">
                                .dz-preview .dz-image img { width: 100%; }
                                .dropzone .dz-preview .dz-details .dz-filename:not(:hover) span { display: none; }
                                </style>
                                <div class="fallback dropzone" id="myDropzone">
                                    <div class="">
                                        <button type="button" class="btn btn-primary" id="addBtn">Tambah File</button>
                                    </div>
                                </div>
                                <script>
                                Dropzone.options.myDropzone = {
                                    url: "{{ route('kost.proses-tambah-foto', ['idKost' => $kost->id]) }}",
                                    maxFilesize: 2,
                                    addRemoveLinks: true,
                                    paramName: "file",
                                    clickable: "#addBtn",
                                    acceptedFiles: "image/*",
                                    maxFiles: 5 - {{ count($kost->fotoKos) }},
                                    dictRemoveFile: 'Remove',
                                    dictFileTooBig: 'Ukuran File Terlalu Besar',
                                    dictDefaultMessage: "",
                                    headers: {
                                        'X-CSRF-Token': "{!! csrf_token() !!}",
                                    },
                                    init: function() {
                                        thisDropzone = this;
                                        //Mengambil data yang sudah ada
                                        $.get("{{ route('kost.proses-get-foto', ['idLelang' => $kost->id]) }}", function(data) {
                                            $.each(data, function(KEY,data){
                                                var mockFile = { size: data.size, serverId: data.id };
                                                thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                                                thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "{{ asset('storage') }}/" + data.thumb + "");
                                            });
                                            $(document).ready(function(){
                                                $(".dropzone .dz-preview").addClass("dz-complete");
                                            });
                                        });
                                        //-------------------------
                                        this.on("uploadprogress", function(file, progress) {
                                            console.log("File progress", progress);
                                        });
                                        this.on("error", function(file) {
                                            this.removeFile(file);
                                        });
                                        this.on("success", function(file, data) {
                                            if(data.success == 1) {
                                                file.serverId = data.id;
                                            }
                                            else {
                                                alert(data.message);
                                            }
                                        });
                                        this.on("removedfile", function(file, data) {
                                            $.ajax({
                                                type: 'POST',
                                                url: "{{ route('kost.proses-hapus-foto', ['idKost' => $kost->id]) }}",
                                                data: {
                                                    'idDokumen': file.serverId,
                                                    '_token'  : $('input[name=_token]').val(),
                                                },
                                                success: function(data){
                                                    if(data.success == 0) {
                                                        alert(data.message);
                                                    }
                                                },
                                                error:function(){
                                                    alert("error!!!!");
                                                }
                                            });
                                        });
                                    }
                                }
                                </script>
                                <div id="photo"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection('content')
