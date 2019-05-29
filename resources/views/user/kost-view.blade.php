<?php
$ifEmpty = "<div class=\"text-muted\"><i class=\"fa fa-close\" aria-hidden=\"true\"></i> TIDAK ADA</div>";
?>
@extends('layouts.user')

@section('meta')
<?php
$foto = "img/default-kost.png";
if(count($kost->fotoKos)>0) {
    $fotoURL = $kost->fotoKos->first()->url;
    //Thumbnail
    $path = pathinfo($fotoURL);
    $path = $path['dirname']."/".$path['filename']."-400.".$path['extension'];
    $foto = "storage/".$path;
}
$i=0;
$deskripsi="Mau kost di Bandar Lampung Kost ".$kost->penghuni." Eksklusif Kost ".$kost->namaKost.", Lampung? ";
if (!empty($kost->fKhusus) || count($kost->kostFK)>0 ) {
  $deskripsi .= "Dapatkan Fasilitas Kamar Kost Berupa ";
  if (count($kost->kostFK)>0) {
    foreach ($kost->kostFK as $key => $fk) {
      if ($i==0) {
        $deskripsi .= $fk->nama;
      }
      else{
        $deskripsi .= ', '.$fk->nama;
      }
      ++$i;
    }
  }
  // if (!empty($kost->fKhusus)) {
  //   foreach ($explode(',', $kost->fKhusus) as $key => $fas) {
  //     if ($i==0) {
  //       $deskripsi .= $fas;
  //     }
  //     else{
  //       $deskripsi .= ', '.$fas;
  //     }
  //     ++$i;
  //   }
  // }
  $deskripsi .= ". Simak infonya disini.";
}

 ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="{{$deskripsi}}">
    <meta name="keywords" content="Info kost Bandar Lampung, Cari Kost Bandar Lampung, Kost Bandar Lampung, Kost campur Bandar Lampung, Kost Murah Bandar Lampung">
    <meta name="robotscontent="index, follow">
    <meta property="og:title" content="Kost Bandar Lampung Kost {{ $kost->penghuni }} Eksklusif Kost {{ $kost->namaKost }}"/>
    <meta name="og:description" content="{{$deskripsi}}">
    <meta property="og:type" content="website"/>
    <meta name="og:site_name" content="Kliko"/>
    <meta property="fb:app_id" content="607562576051242"/>

    <meta property="og:image" content="{{ asset($foto) }}"/>
    <meta name="shareaholic:image" content="{{ asset($foto) }}"/>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@kliko">
    <meta name="twitter:title" content="Kost Bandar Lampung Kost {{ $kost->penghuni }} Eksklusif Kost {{ $kost->namaKost }}">
    <meta name="twitter:description" content="{{$deskripsi}}">
    <meta name="twitter:creator" content="@kliko">
    <meta name="twitter:image" content="{{ asset($foto) }}">
    <meta name="twitter:domain" content="kliko.id">
@endsection

@section('title')
Kost {{ $kost->namaKost }}
@endsection('title')

@section('content')
<?php
    // $foto = "img/default-kost.png";
    // if(count($kost->fotoKos)>0) {
    //     $fotoURL = $kost->fotoKos->first()->url;
    //     //Thumbnail
    //     $path = pathinfo($fotoURL);
    //     $path = $path['dirname']."/".$path['filename']."-400.".$path['extension'];
    //     $foto = "storage/".$path;
    // }
?>

    <!-- <div class="banner-view-kost">
        <div class="banner-img">
            <div data-toggle="modal" data-target="#images" class="pointer card bg-dark text-white" style="border-radius:0;border:none;background-image:url({{ asset($foto) }});background-repeat: no-repeat !important;background-size: cover !important;background-position: 50% 50% !important;;height:530px;">
                <div class="back-tranparent">
                    <div class="card-img-overlay">
                        <a class="btn bg-white shadow-sm" role="button" style="color:#424242;" data-toggle="modal" data-target="#images">Tinjau Foto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br> -->
<div class="content-view">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <br>
                <div class="banner-view-kost">
                    <div class="banner-img">
                    @if(count($kost->fotoKos) > 0)
                        <div id="carouselExampleIndicators" class=" carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php $i=0; ?>
                                @foreach($kost->fotoKos as $foto)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"></li>
                                <?php $i++; ?>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                <?php $i=1; ?>
                                @foreach($kost->fotoKos as $foto)
                                <div class="carousel-item @if($i == 1) active @endif">
                                    <img class="d-block w-100" src="{{ asset('storage/' . $foto->url) }}" alt="{{ $foto->url }}" height="550px">
                                </div>
                                <?php $i++; ?>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @endif    
                    </div>
                </div>
                <br>

                <div class="titles">
                    <div class="row">
                        <div class="col-9">
                            <?php 
                                $colorKost    = "";
                                switch ($kost->penghuni){
                                    case 'Putra':
                                    $colorKost = "#0D4741";
                                    break;
                                    case 'Putri':
                                    $colorKost = "#B71C1C";
                                    break;
                                    case 'Campur':
                                    $colorKost = "#4A148C";
                                    break;
                                }
                            ?>
                            <p class="jenis-hunian">Pemilik : {{ $kost->namaPemilik }}</p>
                            <h3 class="namaKost-view">{{ $kost->namaKost }}</h3>
                            <p class="alamat-kost">{{ $kost->alamatKost }} @if($kost->posKost != null) - {{ $kost->posKost }} @endif </p>

                            <!-- Info Pemilik -->
                    <div class="infoPemilik-viewKost">
                        <div class="row">
                            <!-- Jenis Hunian -->
                            <div class="col-4 fasilitas">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="{{ asset('img/icon.png') }}" alt="Icon-Fasilitas" width="20px" height="23px" style="display:inline-block;">
                                    </div>
                                    <div class="col">
                                        <p style="display:inline-block;font-size:14px;">
                                            @foreach($jhunians as $jhunian)
                                                @if($kost->id_jenis_hunian == $jhunian->id)
                                                    {{ $jhunian->nama }}
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Jenis Penghuni -->
                            <div class="col-4 fasilitas">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="{{ asset('img/icon.png') }}" alt="Icon-Fasilitas" width="20px" height="23px" style="display:inline-block;">
                                    </div>
                                    <div class="col">
                                        <p style="display:inline-block;font-size:14px;">
                                            {{ $kost->penghuni }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Jenis Pembayaran Listrik -->
                            <div class="col-lg-4 fasilitas">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="{{ asset('img/icon.png') }}" alt="Icon-Fasilitas" width="20px" height="23px" style="display:inline-block;">
                                    </div>
                                    <div class="col-9">
                                    <?php $none = "-"; ?>
                                        <p style="display:inline-block;font-size:14px;">
                                            @foreach($jlistriks as $jlistrik)
                                                @if($kost->id_jenis_listrik == $jlistrik->id)
                                                    {{ $jlistrik->nama }}
                                                @else
                                                    
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        </div>
                        <div class="col-2" style="text-align:center;">
                        <!-- {{ $kost->user }} -->
                                    @if($kost->user->foto != null)
                                        <img src="{{ asset('storage/' . $kost->user->foto) }}" alt="" width="70px" height="70px" style="border-radius:50%;">
                                    @else
                                        <img src="{{ asset('img/user.png') }}" alt="" width="70px" height="70px">
                                    @endif
                                    <p class="user-view-kost">{{ $kost->user->nama }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="fasilitas-view-Kost">
                    
                    <!-- Luas Kamar -->
                    <div class="f-border-view">
                        <div class="row">
                            <div class="col-6 col-md-3 baloo">
                                Luas Kamar
                            </div>
                            <div class="col-6 col-md-9">
                                <div class="row">
                                    <div class="col-12">
                                        {{ $kost->luasKamar }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Kamar -->
                    <div class="f-border-view">
                        <div class="row">
                            <div class="col-6 col-md-3 baloo">
                                Jumlah Kamar
                            </div>
                            <div class="col-6 col-md-9">
                                <div class="row">
                                    <div class="col-12">
                                        {{ $kost->jumlahKamar }} Kamar
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                                <br>
                        <!-- text untuk test database -->
                        <!-- <p>test</p> 
                            @foreach($kost->fasilitas_kost as $fkkost)
                                Kost ID : {{ $fkkost->id_kost }} = 
                                @foreach($fasilitas as $fasilitass)
                                    @foreach($fasilitasKategori as $faKate)
                                        @if($fkkost->id_fasilitas == $fasilitass->id)
                                            @if($fasilitass->id_kategori == $faKate->id)
                                                id : {{ $fasilitass->id }} - {{ $fasilitass->nama }} - {{ $faKate->nama }} <br>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach
                        <p>end test</p> -->
                        <!-- end text untuk test database -->
<br>

                     <!-- All Fasilitas -->
                    @foreach($fasilitasKategori as $fkate)
                        <div class="f-border-view">
                            <div class="row">
                                <div class="col-6 col-md-3 baloo">
                                    Fasilitas {{ $fkate->nama }}
                                </div>
                                <div class="col-6 col-md-9">
                                    <div class="row">
                                            @foreach($fasilitas as $fasilitass)
                                                @foreach($kost->fasilitas_kost as $fkkost)
                                                    @if($fkkost->id_fasilitas == $fasilitass->id)
                                                        @if($fasilitass->id_kategori == $fkate->id)
                                                            <div class="col-lg-3 fasilitas">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <img src="{{ asset('img/icon.png') }}" alt="Icon-Fasilitas" width="35px" height="37px" style="display:inline-block;">
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <p style="display:inline-block;">{{ $fasilitass->nama }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            @if( $fkate->nama === "Khusus" )
                                                @if(!empty($kost->fKhusus))
                                                    @foreach(explode(",", $kost->fKhusus) as $fas)
                                                    <div class="col-lg-3 fasilitas">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <img src="{{ asset('img/icon.png') }}" alt="Icon-Fasilitas" width="35px" height="37px" style="display:inline-block;">
                                                            </div>
                                                            <div class="col-8">
                                                                <p style="display:inline-block;">{{ $fas }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            @elseif( $fkate->nama === "Umum" )
                                                @if(!empty($kost->fUmum))
                                                    @foreach(explode(",", $kost->fUmum) as $fas)
                                                    <div class="col-lg-3 fasilitas">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <img src="{{ asset('img/icon.png') }}" alt="Icon-Fasilitas" width="35px" height="37px" style="display:inline-block;">
                                                            </div>
                                                            <div class="col-8">
                                                                <p style="display:inline-block;">{{ $fas }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            @elseif( $fkate->nama === "Lingkungan" )
                                                @if(!empty($kost->fLingkungan))
                                                    @foreach(explode(",", $kost->fLingkungan) as $fas)
                                                    <div class="col-lg-3 fasilitas">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <img src="{{ asset('img/icon.png') }}" alt="Icon-Fasilitas" width="35px" height="37px" style="display:inline-block;">
                                                            </div>
                                                            <div class="col-8">
                                                                <p style="display:inline-block;">{{ $fas }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            @elseif( $fkate->nama === "Kamar Mandi" )
                                                @if(!empty($kost->fKamarMandi))
                                                    @foreach(explode(",", $kost->fKamarMandi) as $fas)
                                                    <div class="col-lg-3 fasilitas">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <img src="{{ asset('img/icon.png') }}" alt="Icon-Fasilitas" width="35px" height="37px" style="display:inline-block;">
                                                            </div>
                                                            <div class="col-8">
                                                                <p style="display:inline-block;">{{ $fas }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach <br>

                    <!-- Keterangan Lainnya -->
                    <div class="f-border-view">
                        <div class="row">
                            <div class="col-6 col-md-3 baloo">
                                Keterangan Lainnya
                            </div>
                            <div class="col-6 col-md-9">
                                <div class="row">
                                    <div class="col-12">
                                    @if(!empty($kost->catatan))
                                        {{ htmlentities($kost->catatan) }}
                                    @else
                                        {!! $ifEmpty !!}
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Maps - Lokasi -->
                    <div class="f-border-view">
                        <div class="view-section">
                            <div class="baloo">
                                Lokasi Menurut Maps <br><br>
                            </div>
                            <div style="padding: 0 20px;">
                                <div id="map_canvas"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4" style="margin-top:10px;">
                <div class="card mb-3  w-100 sticky-top" style="max-width: 100%;top:100px;z-index:1;">  
                    @if($kost->kamarKosong <= 3)
                        <div class="card-header center-card-infoTitle bg-danger">
                            <span style="margin-top:10px;">
                                Tersisa  {{ $kost->kamarKosong }}  kamar
                            </span>
                        </div>
                    @else
                        <div class="card-header center-card-infoTitle bg-success">
                            <span style="margin-top:10px;">
                                Tersedia  {{ $kost->kamarKosong }}  kamar
                            </span>
                        </div>
                    @endif
                        <div class="card-body">
                            <!-- <h5 class="card-title"></h5> -->
                            <p class="card-text">
                                <div class="container" style="font-size:13px;">
                                    <div class="row" style="padding:10px;border:1px solid #eeeeee;">
                                        @if($kost->sewaHari == NULL)
                                            <div class="col-7">
                                                <b style="color:#bdbdbd;">Rp @if($kost->sewaHari != null) {{ number_format($kost->sewaHari, 0, ",", ".") }} @else - @endif</b>
                                            </div>
                                            <div class="col-5">
                                                <b style="color:#bdbdbd;">/ Hari</b>
                                            </div>
                                        @else
                                            <div class="col-7">
                                                <b>Rp @if($kost->sewaHari != null) {{ number_format($kost->sewaHari, 0, ",", ".") }} @else - @endif</b>
                                            </div>
                                            <div class="col-5">
                                                <b>/ Hari</b>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row" style="padding:10px;border:1px solid #eeeeee;border-top:none;">
                                        @if($kost->sewaMinggu == NULL)
                                            <div class="col-7">
                                                <b style="color:#bdbdbd;">Rp @if($kost->sewaMinggu != null) {{ number_format($kost->sewaMinggu, 0, ",", ".") }} @else - @endif</b>
                                            </div>
                                            <div class="col-5">
                                                <b style="color:#bdbdbd;">/ Minggu</b>
                                            </div>
                                        @else
                                            <div class="col-7">
                                                <b>Rp @if($kost->sewaMinggu != null) {{ number_format($kost->sewaMinggu, 0, ",", ".") }} @else - @endif</b>
                                            </div>
                                            <div class="col-5">
                                                <b>/ Minggu</b>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row" style="padding:10px;border:1px solid #eeeeee;border-top:none;">
                                        @if($kost->sewaBulan == NULL)
                                            <div class="col-7">
                                                <b style="color:#bdbdbd;">Rp @if($kost->sewaBulan != null) {{ number_format($kost->sewaBulan, 0, ",", ".") }} @else - @endif</b>
                                            </div>
                                            <div class="col-5">
                                                <b style="color:#bdbdbd;">/ Bulan</b>
                                            </div>
                                        @else
                                            <div class="col-7">
                                                <b>Rp @if($kost->sewaBulan != null) {{ number_format($kost->sewaBulan, 0, ",", ".") }} @else - @endif</b>
                                            </div>
                                            <div class="col-5">
                                                <b>/ Bulan</b>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row" style="padding:10px;border:1px solid #eeeeee;border-top:none;">
                                        @if($kost->sewaTahun == NULL)
                                            <div class="col-7">
                                                <b style="color:#bdbdbd;">Rp @if($kost->sewaTahun != null) {{ number_format($kost->sewaTahun, 0, ",", ".") }} @else - @endif</b>
                                            </div>
                                            <div class="col-5">
                                                <b style="color:#bdbdbd;">/ Tahun</b>
                                            </div>
                                        @else
                                            <div class="col-7">
                                                <b>Rp @if($kost->sewaTahun != null) {{ number_format($kost->sewaTahun, 0, ",", ".") }} @else - @endif</b>
                                            </div>
                                            <div class="col-5">
                                                <b>/ Tahun</b>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <br><div class="row">
                                    <button type="button" class="btn btn-primary btn-responsive-2" style="padding:12px;width:100%;background-color:#6f1994;border:1px solid #6f1994;" data-toggle="modal" data-target="#contact">
                                    Hubungi Pemilik
                                    </button>
                                </div><br>
                                <div class="center-text">
                                    <span>Update terahir Pada</span><br>
                                    <span style="color:#6f1994;padding:6px 0;"> {{ $kost->updated_at }} </span><br>
                                    <span style="font-size:11px;">*Data bisa Berubah Sewaktu waktu</span>
                                </div>
                            </p>
                        </div>
                    <!-- <div class="card-footer center-card-infoTitle" style="background-color:#ff5a5f;" data-toggle="modal" data-target="#contact">Hubungi Pemilik</div> -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Hubungi Pemilik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Nama Pemilik : {{ $kost->namaPemilik }} <br>
            Contact Number : {{ $kost->telpPemilik }}
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal Images -->
<div class="modal fade" id="images" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background-color: rgba(0,0,0,0.99999999) !important;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    @if(count($kost->fotoKos) > 0)
        <div id="carouselExampleIndicators" class="length-carousel carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $i=0; ?>
                @foreach($kost->fotoKos as $foto)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"></li>
                <?php $i++; ?>
                @endforeach
            </ol>
            <div class="carousel-inner">
                <?php $i=1; ?>
                @foreach($kost->fotoKos as $foto)
                <div class="carousel-item @if($i == 1) active @endif">
                    <img class="d-block w-100" src="{{ asset('storage/' . $foto->url) }}" alt="{{ $foto->url }}" height="550px">
                </div>
                <?php $i++; ?>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endif    
    </div>
  </div>
</div>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-595113c8470ec314"></script>
<script>
$(function () {
    var lat = {{ $kost->latitude }},
    lng = {{ $kost->longitude }},
    latlng = new google.maps.LatLng(lat, lng),
    image = '{{ URL::to('img/icon.png') }}';

    var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: 18,
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
        icon: image
    });
});

</script>
@endsection('content')
