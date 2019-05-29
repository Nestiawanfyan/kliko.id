<?php
$ifEmpty = "<div class=\"text-muted\"><i class=\"fa fa-close\" aria-hidden=\"true\"></i> TIDAK ADA</div>";
?>
@extends('layouts.user')

@section('meta')
    <?php
        $foto = "img/default-kost.png";
        if(count($kliprint->fotoprint)>0) {
            $fotoURL = $kliprint->fotoprint->first()->url;
            //Thumbnail
            $path = pathinfo($fotoURL);
            $path = $path['dirname']."/".$path['filename']."-400.".$path['extension'];
            $foto = "storage/".$path;
        }
        $i=0;
    ?>
@endsection

@section('title')
Klik Print -  {{ $kliprint->nama }}
@endsection('title')

@section('content')

    <div class="content-view">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <br>
                    
                    <div class="banner-view-kost">
                        <div class="banner-img">
                        @if(count($kliprint->fotoprint) > 0)
                            <div id="carouselExampleIndicators" class=" carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php $i=0; ?>
                                    @foreach($kliprint->fotoprint as $foto)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"></li>
                                    <?php $i++; ?>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    <?php $i=1; ?>
                                    @foreach($kliprint->fotoprint as $foto)
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

                    <div class="titles" style="margin-top:40px;">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="namaKost-view">{{ $kliprint->nama }}</h3>
                                <p class="alamat-kost">{{ $kliprint->alamat }} @if($kliprint->kode_pos != null) - {{ $kliprint->kode_pos }} @endif </p>
                            </div>
                            <div class="col-2" style="text-align:center;">
                                @if($kliprint->user->foto != null)
                                    <img src="{{ asset('storage/' . $kliprint->user->foto) }}" alt="" width="70px" height="70px" style="border-radius:50%;">
                                @else
                                    <img src="{{ asset('img/user.png') }}" alt="" width="70px" height="70px">
                                @endif
                                <p class="user-view-kost">{{ $kliprint->user->nama }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Maps - Lokasi -->
                    <div class="f-border-view">
                        <div class="view-section">
                            <div class="baloo">
                                Deskripsi <br><br>
                            </div>
                            <div style="padding: 0 20px;">
                               @if ($kliprint->deskripsi == null)
                                    Deskripsi tidak ada
                                @else
                                    {{ $kliprint->deskripsi }}
                                @endif
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


                <div class="col-md-4" style="margin-top:10px;">
                <div class="card mb-3  w-100 sticky-top" style="max-width: 100%;top:100px;z-index:1;">  
                        <div class="card-header center-card-infoTitle bg-success">
                            <span style="margin-top:10px;">
                                Waktu Buka : {{ $kliprint->waktu_buka }}
                            </span>
                        </div>
                        <div class="card-body">
                            <!-- <h5 class="card-title"></h5> -->
                            <p class="card-text">
                                <div class="container" style="font-size:13px;">
                                    <div class="row" style="padding:10px;border:1px solid #eeeeee;">
                                            <div class="col-7">
                                                <b>Rp Belum Diketahui </b>
                                            </div>
                                            <div class="col-5">
                                                <b>/ Lembar / Hitam Putih</b>
                                            </div>
                                    </div>
                                    <div class="row" style="padding:10px;border:1px solid #eeeeee;">
                                            <div class="col-7">
                                                <b>Rp Belum Diketahui </b>
                                            </div>
                                            <div class="col-5">
                                                <b>/ Lembar / Warna</b>
                                            </div>
                                    </div>
                                </div>
                                <br><div class="row">
                                    <button type="button" class="btn btn-primary btn-responsive-2" style="padding:12px;width:100%;background-color:#6f1994;border:1px solid #6f1994;" data-toggle="modal" data-target="#contact">
                                    Hubungi Pemilik
                                    </button>
                                </div><br>
                                <div class="center-text">
                                    <span>Update terahir Pada</span><br>
                                    <span style="color:#6f1994;padding:6px 0;"> {{ $kliprint->updated_at }} </span><br>
                                    <span style="font-size:11px;">*Data bisa Berubah Sewaktu waktu</span>
                                </div>
                            </p>
                        </div>
                </div>
            </div>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-595113c8470ec314"></script>
    <script>
        $(function () {
            var lat = {{ $kliprint->latitude }},
            lng = {{ $kliprint->longitude }},
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
@endsection