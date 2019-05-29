@extends('layouts.user')

@section('title')
Tambah Kost
@endsection('title')

@section('head-style')
<link rel="stylesheet" href="{{ asset('dist/css/dropzone.min.css') }}">
@endsection('head-style')

@section('head-script')
<script src="{{ asset('dist/js/general.js') }}"></script>
<script src="{{ asset('dist/js/dropzone.js') }}"></script>
@endsection('head-script')

@section('content')
<!-- <div class="pageheader small text-xs-center"> -->
    <!-- <div class="tttt"> -->
    <div class="container" style="margin-top:40px;font-family: 'Didact Gothic', sans-serif;">
            <div class="row">
                <div class="col-xs-12 title-wrap">
                    <h1 class="title-web" style="color:#424242;">Tambah Kost</h1>
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
        <form class="col-md-9" action="{{ route('proses-tambah') }}" method="post" enctype="multipart/form-data">
            @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
            @endif
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <div class="form-kost" id="formkost" role="tablist" aria-multiselectable="true">

                <!--PEMILIK KOST-->
                <div class="panel panel-default">
                    <button type="button" class="list-group-item form-btn w-100" id="headingone" data-toggle="collapse" data-target="#pemilikkost" aria-expanded="true" aria-controls="collapseOne">INFORMASI PEMILIK/PENGELOLA KOST</button>
                    <div class="info-kost collapse in show" id="pemilikkost" aria-labelledby="headingone" data-parent="#formkost">
                        <div class="form-group" id="namaPemilik">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Nama Pemilik/Pengelola*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" value="" class="form-control" oninput="validasiNamaPemilik()" onblur="validasiNamaPemilik()" name="namaPemilik" placeholder="Isi Nama Pemilik Kost" requiresd>
                                    <div class="mssg">
                                        @if($errors->has('namaPemilik'))
                                        @foreach($errors->get('namaPemilik') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="telpPemilik">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Nomor Telepon/HP*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" value=""  class="form-control" oninput="validasiTelpPemilik()" onblur="validasiTelpPemilik()" name="telpPemilik" placeholder="08xxxxxx" requiresd>
                                    <div class="mssg">
                                        @if($errors->has('telpPemilik'))
                                        @foreach($errors->get('telpPemilik') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="alamatPemilik">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Alamat*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" value="" class="form-control" oninput="validasiAlamatPemilik()" onblur="validasiAlamatPemilik()" name="alamatPemilik" placeholder="Alamat Lengkap Pemilik Kost" requiresd>
                                    <div class="mssg">
                                        @if($errors->has('alamatPemilik'))
                                        @foreach($errors->get('alamatPemilik') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="namaKost">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Nama Kost*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" value="" class="form-control" oninput="validasiNamaKost()" onblur="validasiNamaKost()" name="namaKost" placeholder="Isi Nama Kost" requiresd>
                                    <div class="mssg">
                                        @if($errors->has('namaKost'))
                                        @foreach($errors->get('namaKost') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="jenisHunian">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Jenis Hunian*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                <select name="id_jenis_hunian" id="jenishunianselect" class="form-control" style="width:100%;" onchange="jenisHunian()">
                                    @foreach($hunian as $jenishunian)
                                        <option value="{{ $jenishunian->id }}" style="width:100%;"> {{ $jenishunian->nama }} </option>
                                    @endforeach
                                    </select>
                                    <div class="mssg">
                                        @if($errors->has('namaKost'))
                                        @foreach($errors->get('namaKost') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="alamatKost">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Alamat Kost*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" value="" class="form-control" oninput="validasiAlamatKost()" onblur="validasiAlamatKost()" name="alamatKost" placeholder="Alamat Lengkap Kost" requiresd>
                                    <div class="mssg">
                                        @if($errors->has('alamatKost'))
                                        @foreach($errors->get('alamatKost') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="posKost">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Kode Pos
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" value="" class="form-control" oninput="validasiPosKost()" onblur="validasiPosKost()" name="posKost" placeholder="35151" requiresd>
                                    <div class="mssg">
                                        @if($errors->has('posKost'))
                                        @foreach($errors->get('posKost') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="telpKost">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Nomor Telepon Kost
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" value="" class="form-control" oninput="validasiTelpKost()" onblur="validasiTelpKost()" name="telpKost" placeholder="08xxxxxx">
                                    <div class="mssg">
                                        @if($errors->has('telpKost'))
                                        @foreach($errors->get('telpKost') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="luasKamar">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Luas Kamar*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" value="" class="form-control" oninput="validasiLuasKamar()" onblur="validasiLuasKamar()" name="luasKamar" placeholder="4x3" requiresd>
                                    <div class="mssg">
                                        @if($errors->has('luasKamar'))
                                        @foreach($errors->get('luasKamar') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="jumlahKamar">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Jumlah Kamar*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" value="" class="form-control" oninput="validasiJumlahKamar()" onblur="validasiJumlahKamar()" name="jumlahKamar" placeholder="Jumlah Kamar Keseluruhan" requiresd>
                                    <div class="mssg">
                                        @if($errors->has('jumlahKamar'))
                                        @foreach($errors->get('jumlahKamar') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="kamarKosong">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Kamar Kosong*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" value="" class="form-control" oninput="validasiKamarKosong()" onblur="validasiKamarKosong()" name="kamarKosong" placeholder="Jumlah Kamar Kosong" requiresd>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="jensiListrik">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Jenis Listrik*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <select name="id_jenis_listrik" id="jenisListrik" class="form-control" style="width:100%;">
                                    @foreach($jls as $jenisListrik)
                                        <option value="{{ $jenisListrik->id }}" style="width:100%;"> {{ $jenisListrik->nama }} </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="penghuni">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Penghuni*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-4">
                                            <label class="c-input c-radio">
                                                <input onblur="validasiPenghuni()" name="penghuni" type="radio" value="p"
                                                checked
                                                >
                                                <span class="c-indicator"></span>
                                                Putra
                                            </label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <label class="c-input c-radio">
                                                <input onblur="validasiPenghuni()" name="penghuni" type="radio" value="w"
                                                >
                                                <span class="c-indicator"></span>
                                                Putri
                                            </label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <label class="c-input c-radio">
                                                <input onblur="validasiPenghuni()" name="penghuni" type="radio" value="c"
                                                >
                                                <span class="c-indicator"></span>
                                                Campur
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mssg">
                                        @if($errors->has('penghuni'))
                                        @foreach($errors->get('penghuni') as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="padding-bottom:0;">
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <input id="maps-input" type="text" placeholder="Tulis Nama Tempat, Kampus, Sekolah, dll">
                                    <div id="map_canvas"></div>
                                    <div class="row latlng">
                                            <div class="col-6">
                                                <span>Latitude</span><br>
                                                <input name="latitude" class="MapLat form-control" value="-5.396242372530452" type="text">
                                            </div>
                                            <div class="col-6">
                                                <span>Longitude</span><br>                                         
                                                <input name="longitude" class="MapLon form-control" value="105.26708910740967" type="text">
                                            </div>
                                            <input  class="MapLat latlng form-control col-xs-6 col-md-4 disabled" value="-5.396242372530452" type="hidden">
                                            <input  class="MapLon latlng form-control col-xs-6 col-md-4 disabled" value="105.26708910740967" type="hidden">
                                    </div>
                                </div>
                            </div>
                            <script>
                            $(function () {
                                var lat = -5.3971396,
                                lng = 105.2667887,
                                latlng = new google.maps.LatLng(lat, lng),
                                image = '{{ URL::to('img/icon.png') }}';
                                //zoomControl: true,
                                //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,
                                var mapOptions = {
                                    center: new google.maps.LatLng(lat, lng),
                                    zoom: 13,
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
                    <div class="form-group">
                        <div class="row">
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right">
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <button type="button" id="btnNextSewa" style="background-color:#6f1994;border:1px solid #6f1994;" class="btn btn-primary float-right" disabled data-toggle="collapse" data-parent="#formkost" href="#hargasewa">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--INFO KOST END-->

    <!--SEWA KOST-->
    <div class="panel panel-default">
        <button type="button" id="btnCollapseSewa" class="list-group-item form-btn collapsed w-100" data-toggle="collapse" data-target="#hargasewa" aria-expanded="true" aria-controls="collapseOne">HARGA SEWA</button>
        <div class="info-kost collapse" id="hargasewa" aria-labelledby="btnCollapseSewa" data-parent="#formkost">
            <!-- <div class="form-group" id="sewaMin">
                <div class="row">
                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                        Sewa Minimal*
                    </label>
                    <div class="col-xs-12 col-md-9">
                        <select class="c-select" name="sewaMin" requiresd>
                            @for($i=1; $i<=12; $i++)
                            <option value="{{ $i }}">{{ $i }} Bulan</option>
                            @endfor
                        </select>
                        <div class="mssg">
                            @if($errors->has('sewaMin'))
                            @foreach($errors->get('sewaMin') as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="form-group" id="sewaHari">
                <div class="row">
                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                        Harian
                    </label>
                    <div class="col-xs-12 col-md-9">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" value="" oninput="validasiSewaHari()" onblur="validasiSewaHari()" class="form-control" name="sewaHari" placeholder="50000" aria-describedby="basic-addon1">
                        </div>
                        <div class="mssg">
                            @if($errors->has('sewaHari'))
                            @foreach($errors->get('sewaHari') as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="sewaMinggu">
                <div class="row">
                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                        Mingguan
                    </label>
                    <div class="col-xs-12 col-md-9">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" value="" oninput="validasiSewaMinggu()" onblur="validasiSewaMinggu()" class="form-control" name="sewaMinggu" placeholder="150000" aria-describedby="basic-addon1">
                        </div>
                        <div class="mssg">
                            @if($errors->has('sewaMinggu'))
                            @foreach($errors->get('sewaMinggu') as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="sewaBulan">
                <div class="row">
                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                        Bulanan
                    </label>
                    <div class="col-xs-12 col-md-9">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" value="" oninput="validasiSewaBulan()" onblur="validasiSewaBulan()" class="form-control" name="sewaBulan" placeholder="500000" aria-describedby="basic-addon1">
                        </div>
                        <div class="mssg">
                            @if($errors->has('sewaBulan'))
                            @foreach($errors->get('sewaBulan') as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="sewaTahun">
                <div class="row">
                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                        Tahunan
                    </label>
                    <div class="col-xs-12 col-md-9">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" value="" oninput="validasiSewaTahun()" onblur="validasiSewaTahun()" class="form-control" name="sewaTahun" placeholder="4000000" aria-describedby="basic-addon1" requiresd>
                        </div>
                        <div class="mssg">
                            @if($errors->has('sewaTahun'))
                            @foreach($errors->get('sewaTahun') as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                    </label>
                    <div class="col-xs-12 col-md-9">
                        <button type="button"  id="btnNextFasilitas" style="background-color:#6f1994;border:1px solid #6f1994;" class="btn btn-primary float-right" data-toggle="collapse" data-parent="#formkost" href="#fasilitas">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--SEWA KOST END-->

   
   <!-- fasilitas KoSt -->

    <div class="panel panel-default">
        <button type="button" id="btnCollapseFasilitas" class="list-group-item form-btn collapsed w-100" data-toggle="collapse" data-target="#fasilitas" aria-expanded="true" aria-controls="collapseOne">FASILITAS</button>
        <div class="info-kost collapse" id="fasilitas" aria-labelledby="btnCollapseFasilitas" data-parent="#formkost">
                        
                <div class="form-group" id="fKhusus">
                    <div class="row">
                    @foreach($fasilitasKategori as $faKate)
                        <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                            {{ $faKate->nama }}<br>
                            <!-- <small>Fasilitas untuk khusus untuk pribadi</small> -->
                        </label>
                        <div class="col-xs-12 col-md-9">
                            <div class="row">
                                <div class="col-xs-6 col-md-4">
                                    <label class="c-input c-checkbox">
                                        @foreach($fasilitas as $fasilitass)
                                            @if($faKate->id === $fasilitass->id_kategori)
                                            <input type="checkbox" name="fasilitas[]" value="{{ $fasilitass->id }}"><span class="c-indicator">{{ $fasilitass->nama }}</span>
                                            @endif
                                        @endforeach
                                    </label>
                                </div>
                            </div>
                            <div class="row fas-lain">
                                        <div class="col-xs-12">
                                            <label>Fasilitas Khusus Lainnya</label>
                                            <small>(Pisahkan dengan tanda koma ",")</small>
                                            <input type="text" class="form-control" name="f{{$faKate->id}}" value="">
                                        </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            
            
                @foreach($fasilitasKategori as $faKate)
                    <!-- <br><h5> {{ $faKate->nama }}</h5> -->
                    @foreach($fasilitas as $fasilitass)
                        <!-- <p>{{ $fasilitass->nama }}</p> -->
                    @endforeach
                @endforeach

            </div>

        </div>
    </div>

   <!-- fasilitas kost end -->

<!--FOTO - FOTO KOST-->
<div class="panel panel-default">
    <button type="button" id="btnCollapseFoto" class="list-group-item form-btn collapsed w-100" data-toggle="collapse" data-target="#foto" aria-expanded="true" aria-controls="collapseOne">FOTO - FOTO</button>
    <div class="info-kost collapse" id="foto" aria-labelledby="btnCollapseFoto" data-parent="#formkost">
        <div class="form-group">
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
            <div class="row">
                <div class="w-100">
                    <div class="fallback dropzone" id="myDropzone">
                        <div class="">
                            <button type="button" class="btn btn-primary" id="addBtn"><i class="fa fa-picture-o"></i> Tambah Foto</button>
                        </div>
                    </div>
                    <script>
                    Dropzone.options.myDropzone = {
                        url: "{{ route('proses-tambah-foto') }}",
                        maxFilesize: 3,
                        addRemoveLinks: true,
                        paramName: "file",
                        clickable: "#addBtn",
                        acceptedFiles: "image/*",
                        maxFiles: 5,
                        dictRemoveFile: 'Remove',
                        dictFileTooBig: 'Ukuran File Terlalu Besar',
                        dictDefaultMessage: "",
                        headers: {
                            'X-CSRF-Token': "{!! csrf_token() !!}",
                        },
                        init: function() {
                            this.on("uploadprogress", function(file, progress) {
                                console.log("File progress", progress);
                            });
                            this.on("error", function(file) {
                                this.removeFile(file);
                            });
                            this.on("success", function(file, data) {
                                file.serverId = data.nama;
                                $(document).ready(function(){
                                    $("#photo").append("<input type='hidden' name='img[]' value='" + data.nama + "' data-nameFile='" + file.serverId + "'>");
                                });
                            });
                            this.on("removedfile", function(file, data) {
                                $.ajax({
                                    type: 'POST',
                                    url: "{{ route('proses-hapus-foto') }}",
                                    data: {
                                        'nama': file.serverId,
                                        '_token'  : $('input[name=_token]').val(),
                                    },
                                    success: function(data){
                                        if(data.success == 0) {
                                            alert(data.message);
                                        }
                                        $(document).ready(function(){
                                            $("input[data-nameFile='" + file.serverId + "']").remove();
                                        });
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
        <div class="form-group">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    <button type="submit" style="background-color:#6f1994;border:1px solid #6f1994;" class="btn btn-primary float-right">Tambah Baru</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FOTO - FOTO END-->

</div>
</form>
</div>
</div>

<script type="text/javascript">
$(function(){
    $('input[type=file]').change(function(){
        var file = this.files[0];
        name = file.name;
        size = file.size;
        type = file.type;
        value = file.value;
        x = 0;

        switch (type) {
            case 'image/png':
            case 'image/jpeg':
            case 'image/pjpeg': break;
            default:
            $("#notif").html("<div class='alert alert-danger'>Gambar HarusJPG/PNG</div>");
            $(this).next(".file-custom").html("Pilih Foto");
            $(this).replaceWith($(this).val('').clone(true));
            x=1;
            return 0;
            break;
        }
        if(size>3097152) {
            $("#notif").html("<div class='alert alert-danger'>Maksimal 2 MB</div>");
            $(this).next(".file-custom").html("Pilih Foto");
            $(this).replaceWith($(this).val('').clone(true));
            x=1;
            return 0;
        }
        if(x==0) {
            $("#notif").html("");
            $(this).next(".file-custom").html(name);
        }
    });
});
</script>
<script src="{{ URL::to('dist/js/tambahValidation.js') }}"></script>
@endsection('content')
