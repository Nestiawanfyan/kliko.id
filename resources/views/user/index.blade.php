<?php
    Use App\Foto;
    Use App\PercetakanFoto;
    ?>
@extends('layouts.user')

@section('title')
    Info Kost Daerah Bandar Lampung dan Sekitarnya
@endsection('title')

@section('content')    

@include('contentUser.bannerHome')  

<div class="container content-wrapper">
    <!-- <form class="filter-search" action="{{ route('kosList')}}" method="get">
        <input type="hidden" name="filter">
        <div class="filter-jenis-kost">
            <i class="fa fa-users"></i>
            <select class="form-control" name="penghuni">
                <option value=""><label for="">Penghuni</label></option>
                <option value="Putra">Putra</option>
                <option value="Putri">Putri</option>
                <option value="Campur">Campur</option>
            </select>
        </div>
        <div class="filter-jangka-waktu">
            <i class="fa fa-calendar"></i>
            <select class="form-control" name="waktu">
                <option value="hari">Harian</option>
                <option value="minggu">Mingguan</option>
                <option value="bulan">Bulanan</option>
                <option value="tahun" selected>Tahunan</option>
            </select>
        </div>
        <div class="filter-harga">
            <span class="value-harga value-lower" id="slider-snap-value-lower"></span>
            <span class="value-harga value-upper" id="slider-snap-value-upper"></span>
            <input type="hidden" name="min" id="min-harga">
            <input type="hidden" name="max" id="max-harga">
            <div id="slider" class="custom-range"></div>
        </div>
        <button type="submit" class="button-filter"><i class="fa fa-sliders" aria-hidden="true"></i> Filter</button>
    </form> -->
    
    <br><br>
        <!-- <div class="bullet-box-header" data-aos="fade-zoom-in" data-aos-once="true"> -->
            <h3 data-aos="fade-zoom-in" data-aos-once="true" style="text-align:center;" class="card-banner-title">Rekomendasi Kamar Terbaru</h3>
            <p data-aos="fade-zoom-in" data-aos-once="true" style="text-align:center;" class="card-text">Menampilkan kamar kamar terbaru di berbagai daerah </p>
        <!-- </div> -->
    <br><br>

    <!-- tabs kontrakan, kost, and bedeng -->
    <div class="row">


        <div class="col-md-6 col-lg-3" data-aos="fade-up-right" data-aos-once="true">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-kost-tab" data-toggle="pill" href="#v-pills-kost" role="tab" aria-controls="v-pills-kost" aria-selected="true">Kost</a>
            <a class="nav-link" id="v-pills-kontrakan-tab" data-toggle="pill" href="#v-pills-kontrakan" role="tab" aria-controls
            <a class="nav-link" id="v-pills-bedeng-tab" data-toggle="pill" href="#v-pills-bedeng" role="tab" aria-controls="v-pills-bedeng" aria-selected="false">Bedeng</a>
            </div>
="v-pills-kontrakan" aria-selected="false">Kontrakan</a>        </div>
        <div class="col-md-6 col-lg-9" data-aos="fade-up-left" data-aos-once="true">
            <div class="tab-content" id="v-pills-tabContent">

            <!-- Kost -->
            <div class="tab-pane fade show active" id="v-pills-kost" role="tabpanel" aria-labelledby="v-pills-kost-tab"> 
            
                @if(count($dataKost) == 0)
                    <div class="center-error">
                        <p>Mohon Maaf, <br> Data Kost Tidak Ada...</p>
                    </div>
                @else
                <div class="row list-kost">             
                    @foreach($kosts as $kost)
                    <?php
                    $foto = "img/default-kost.png";
                    if(count($kost->fotoKos)>0) {
                        $fotoURL = $kost->fotoKos->first()->url;
                        //Thumbnail
                        $path = pathinfo($fotoURL);
                        $path = $path['dirname']."/".$path['filename']."-400.".$path['extension'];
                        $foto = "storage/".$path;
                    }
                    ?>
                    
                    <a class="col-md-6 col-lg-4" style="padding-right:5px;padding-left:5px;" href="{{ route('kost.view', ['kost' => $kost->seoTitle]) }}">
                    <div>
                            <div class="card" style="border:none;margin-bottom:40px;">
                                @if($kost->kamarKosong <= 0)
                                <span class="kamar-sisa">
                                    Kamar Penuh
                                </span>
                                @elseif($kost->kamarKosong <= 2)
                                <span class="kamar-sisa">
                                    {{ $kost->kamarKosong }} Kamar Kosong
                                </span>
                                @else
                                <span class="kamar-penuh">
                                    {{ $kost->kamarKosong }} Kamar Kosong
                                </span>
                                @endif
                                <img class="card-img-top" src="{{ asset($foto) }}" alt="Foto {{ $kost->namaKost }}">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col">
                                    <?php 
                                        $iconPenghuni = "";
                                        $colorKost    = "";
                                        switch ($kost->penghuni){
                                            case 'Putra':
                                            $iconPenghuni = asset('img/kliko/Male-Icon-Kliko.png');
                                            $colorKost = "#0D4741";
                                            break;
                                            case 'Putri':
                                            $iconPenghuni = asset('img/kliko/Icon-Marker-Female.png');
                                            $colorKost = "#B71C1C";
                                            break;
                                            case 'Campur':
                                            $iconPenghuni = asset('img/kliko/Icon-Marker-Male+Female.png');
                                            $colorKost = "#4A148C";
                                            break;
                                        }
                                        ?>
                                        <!-- <img src="{{ $iconPenghuni }}" alt="Icon" style="width:30px;float:left;height:30px;"> -->
                                        <p class="jenis-kost pull-left label label-primary">
                                            <span style="color:{{ $colorKost }};">{{ $kost->penghuni }}.</span>
                                            <span>Min: {{ $kost->sewaMin}} Bulan</span>
                                        </p>
                                    </div>
                                </div>
                                <h3 class="name-kost">
                                    <p style="color:#404040;"><span style="font-family: 'Bitter', serif;font-size:15px;">{{ $kost->namaKost }}</span></p>
                                </h3>
                                @if($kost->sewaTahun > 0)
                                <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($kost->sewaTahun, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Tahun</span></small></p>
                                @elseif($kost->sewaBulan > 0)
                                <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($kost->sewaBulan, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Bulan</span></small></p>
                                @elseif($kost->sewaMinggu > 0)
                                <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($kost->sewaMinggu, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Minggu</span></small></p>
                                @elseif($kost->sewaHari > 0)
                                <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($kost->sewaHari, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Hari</span></small></p>
                                @else
                                <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($kost->sewaTahun, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Tahun</span></small></p>
                                @endif
                        </div>
                    </div>
                </div>
                </a>

                @endforeach
                <a href="{{ route('kosList') }}" class="float-right" style="font-family: 'Didact Gothic', sans-serif;font-size:18px;color:#6f1994;margin-left:5px;width:100%;margin-top:20px;">Liat Lebih Banyak Lagi (<?php echo count($dataKost); ?>+)</a>                                                                        
                    <!-- <p class="col-sm-12 text-xs-center">
                        <a href="{{ route('kosList') }}" class="btn btn-lg btn-primary">LEBIH BANYAK</a>
                    </p> -->
                </div>
                @endif
            </div>
            
            <!-- Kontrakan -->
            <div class="tab-pane fade" id="v-pills-kontrakan" role="tabpanel" aria-labelledby="v-pills-kontrakan-tab">
            @if(count($dataKont) == 0)
                <div class="center-error">
                    <p>Mohon Maaf, <br> Data Kontrakan Tidak Ada...</p>
                </div>
            @else
            <div class="row list-kost">             
                @foreach($konts as $kont)
                <?php
                $foto = "img/default-kost.png";
                if(count($kont->fotoKos)>0) {
                    $fotoURL = $kont->fotoKos->first()->url;
                    //Thumbnail
                    $path = pathinfo($fotoURL);
                    $path = $path['dirname']."/".$path['filename']."-400.".$path['extension'];
                    $foto = "storage/".$path;
                }
                ?>
                
                <a class="col-md-6 col-lg-4" style="padding-right:5px;padding-left:5px;" href="{{ route('kost.view', ['kost' => $kont->seoTitle]) }}">
                <div>
                        <div class="card" style="border:none;margin-bottom:40px;">
                            @if($kont->kamarKosong <= 0)
                            <span class="kamar-sisa">
                                Kamar Penuh
                            </span>
                            @elseif($kont->kamarKosong <= 2)
                            <span class="kamar-sisa">
                                {{ $kont->kamarKosong }} Kamar Kosong
                            </span>
                            @else
                            <span class="kamar-penuh">
                                {{ $kont->kamarKosong }} Kamar Kosong
                            </span>
                            @endif
                            <img class="card-img-top" src="{{ asset($foto) }}" alt="Foto {{ $kont->namaKost }}">
                        <div class="card-block">
                            <div class="row">
                                <div class="col">
                                <?php 
                                    $iconPenghuni = "";
                                    $colorKost    = "";
                                    switch ($kont->penghuni){
                                        case 'Putra':
                                        $iconPenghuni = asset('img/kliko/Male-Icon-Kliko.png');
                                        $colorKost = "#0D4741";
                                        break;
                                        case 'Putri':
                                        $iconPenghuni = asset('img/kliko/Icon-Marker-Female.png');
                                        $colorKost = "#B71C1C";
                                        break;
                                        case 'Campur':
                                        $iconPenghuni = asset('img/kliko/Icon-Marker-Male+Female.png');
                                        $colorKost = "#4A148C";
                                        break;
                                    }
                                    ?>
                                    <!-- <img src="{{ $iconPenghuni }}" alt="Icon" style="width:30px;float:left;height:30px;"> -->
                                    <p class="jenis-kost pull-left label label-primary">
                                        <span style="color:{{ $colorKost }};">{{ $kont->penghuni }}.</span>
                                        <span>Min: {{ $kont->sewaMin}} Bulan</span>
                                    </p>
                                </div>
                            </div>
                            <h3 class="name-kost">
                                <p style="color:#404040;"><span style="font-family: 'Bitter', serif;font-size:15px;">{{ $kont->namaKost }}</span></p>
                            </h3>
                            @if($kont->sewaTahun > 0)
                            <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($kont->sewaTahun, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Tahun</span></small></p>
                            @elseif($kont->sewaBulan > 0)
                            <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($kont->sewaBulan, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Bulan</span></small></p>
                            @elseif($kont->sewaMinggu > 0)
                            <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($kont->sewaMinggu, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Minggu</span></small></p>
                            @elseif($kont->sewaHari > 0)
                            <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($kont->sewaHari, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Hari</span></small></p>
                            @else
                            <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($kont->sewaTahun, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Tahun</span></small></p>
                            @endif
                        </div>
                    </div>
                </div>
                </a>

                @endforeach
                <a href="{{ route('kosList') }}" class="float-right" style="font-family: 'Didact Gothic', sans-serif;font-size:18px;color:#6f1994;margin-left:5px;width:100%;margin-top:20px;">Liat Lebih Banyak Lagi (<?php echo count($dataKont); ?>+)</a>                                                                        
                    <!-- <p class="col-sm-12 text-xs-center">
                        <a href="{{ route('kosList') }}" class="btn btn-lg btn-primary">LEBIH BANYAK</a>
                    </p> -->
                </div>
                @endif
            </div>
            
            <!-- Bedeng -->
            <div class="tab-pane fade" id="v-pills-bedeng" role="tabpanel" aria-labelledby="v-pills-bedeng-tab">
            @if(count($dataBed) == 0)
                <div class="center-error">
                    <p>Mohon Maaf, <br> Data Kontrakan Sedang Kosong...</p>
                </div>
            @else
            <div class="row list-kost">             
                @foreach($beds as $bed)
                <?php
                $foto = "img/default-kost.png";
                if(count($bed->fotoKos)>0) {
                    $fotoURL = $bed->fotoKos->first()->url;
                    //Thumbnail
                    $path = pathinfo($fotoURL);
                    $path = $path['dirname']."/".$path['filename']."-400.".$path['extension'];
                    $foto = "storage/".$path;
                }
                ?>
                
                <a class="col-md-6 col-lg-4" style="padding-right:5px;padding-left:5px;" href="{{ route('kost.view', ['kost' => $bed->seoTitle]) }}">
                <div>
                        <div class="card" style="border:none;margin-bottom:40px;">
                            @if($bed->kamarKosong <= 0)
                            <span class="kamar-sisa">
                                Kamar Penuh
                            </span>
                            @elseif($bed->kamarKosong <= 2)
                            <span class="kamar-sisa">
                                {{ $bed->kamarKosong }} Kamar Kosong
                            </span>
                            @else
                            <span class="kamar-penuh">
                                {{ $bed->kamarKosong }} Kamar Kosong
                            </span>
                            @endif
                            <img class="card-img-top" src="{{ asset($foto) }}" alt="Foto {{ $bed->namaKost }}">
                        <div class="card-block">
                            <div class="row">
                                <div class="col">
                                <?php 
                                    $iconPenghuni = "";
                                    $colorKost    = "";
                                    switch ($bed->penghuni){
                                        case 'Putra':
                                        $iconPenghuni = asset('img/kliko/Male-Icon-Kliko.png');
                                        $colorKost = "#0D4741";
                                        break;
                                        case 'Putri':
                                        $iconPenghuni = asset('img/kliko/Icon-Marker-Female.png');
                                        $colorKost = "#B71C1C";
                                        break;
                                        case 'Campur':
                                        $iconPenghuni = asset('img/kliko/Icon-Marker-Male+Female.png');
                                        $colorKost = "#4A148C";
                                        break;
                                    }
                                    ?>
                                    <!-- <img src="{{ $iconPenghuni }}" alt="Icon" style="width:30px;float:left;height:30px;"> -->
                                    <p class="jenis-kost pull-left label label-primary">
                                        <span style="color:{{ $colorKost }};">{{ $bed->penghuni }}.</span>
                                        <span>Min: {{ $bed->sewaMin}} Bulan</span>
                                    </p>
                                </div>
                            </div>
                            <h3 class="name-kost">
                                <p style="color:#404040;"><span style="font-family: 'Bitter', serif;font-size:15px;">{{ $bed->namaKost }}</span></p>
                            </h3>
                            @if($bed->sewaTahun > 0)
                            <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($bed->sewaTahun, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Tahun</span></small></p>
                            @elseif($bed->sewaBulan > 0)
                            <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($bed->sewaBulan, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Bulan</span></small></p>
                            @elseif($bed->sewaMinggu > 0)
                            <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($bed->sewaMinggu, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Minggu</span></small></p>
                            @elseif($bed->sewaHari > 0)
                            <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($bed->sewaHari, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Hari</span></small></p>
                            @else
                            <p class="card-text"><small class="text-muted"><span class="harga">Rp {{ number_format($bed->sewaTahun, 0, ",", ".") }}</span style="color:#616161;"> <span style="font-size:14px;" >Per Tahun</span></small></p>
                            @endif
                        </div>
                    </div>
                </div>
                </a>

                @endforeach
                <a href="{{ route('kosList') }}" class="float-right" style="font-family: 'Didact Gothic', sans-serif;font-size:18px;color:#6f1994;margin-left:5px;width:100%;margin-top:5px;">Liat Lebih Banyak Lagi (<?php echo count($dataBed); ?>+)</a>                                                                        
                    <!-- <p class="col-sm-12 text-xs-center">
                        <a href="{{ route('kosList') }}" class="btn btn-lg btn-primary">LEBIH BANYAK</a>
                    </p> -->
                </div>
                @endif
            </div>
            
            </div>
        </div>
    </div>
    <!-- end tabs kontrakan, kost, and bedeng -->

</div>
<!--Header END-->

<!-- Banner add kost -->
<!-- <div class="banner-img ">
    <div class="container">
    <div class="card bg-dark text-white img-banner" style="border:none;background-image:url({{ asset('img/picture/banner-home-2.jpg') }});height:45vh;">
            <div class="back-transparent">
                <div class="back-transparent-2">
                    <div class="card-img-overlay" style="text-align:center;margin:70px 0;">
                        <h5 class="card-title" style="font-family: 'Baloo Bhaina', cursive;font-size:27px;">Apakah Anda Pemilik Kos Kostan ?</h5>
                        <p class="card-text">Daftarkan dan Promosikan kost anda di Kliko.id <br> agar lebih dikenal dan dilihat oleh banyak orang.</p>
                        <a class="btn bg-white shadow-sm" href="{{ route('tambah') }}" role="button" style="color:#424242;">Tambah Kost Anda</a>
                        <br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Banner add kost end -->

<!-- klikprint -->
    <br><br>
        <!-- <div class="bullet-box-header" data-aos="fade-zoom-in" data-aos-once="true"> -->
            <h3 data-aos="fade-zoom-in" data-aos-once="true" style="text-align:center;" class="card-banner-title">Rekomendasi Tempat Print</h3>
            <p data-aos="fade-zoom-in" data-aos-once="true" style="text-align:center;" class="card-text">Menampilkan tempat print dan fotocopy terbaru di berbagai daerah </p>
        <!-- </div> -->

        @include('contentUser.kliprintLanding')

    <br><br>
<!-- klikprint end -->

<!-- KOTA -->
<div class="kampus wrapper">
    <div class="container">

    <!-- <div class="bullet-box-header" data-aos="fade-zoom-in" data-aos-once="true"> -->
        <h3 data-aos="fade-zoom-in" data-aos-once="true" style="text-align:center;" class="card-banner-title">Kota Besar</h3>
        <p data-aos="fade-zoom-in" data-aos-once="true" style="text-align:center;" class="card-text">Cari Kostan tempat Kota idamanmu</p>
    <!-- </div> -->
    <br><br>
                                    
        <div style="width:80%;margin:0 auto;">
            <div class="row text-xs-center" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-once="true">  
                <div class="col" style="margin:10px;">
                    <a href="" class="btn btn-primary btn-responsive-2" style="border:1px solid transparent;background-color:#6f1994;padding:20px 50px;">Bandar Lampung</a>                     
                    </div>
                    <div class="col" style="margin:10px;">
                    <a href="" class="btn btn-primary btn-responsive-2" style="border:1px solid transparent;background-color:#6f1994;padding:20px 34%;">Jakarta</a>                     
                    </div>
                    <div class="col" style="margin:10px;">
                    <a href="" class="btn btn-primary btn-responsive-2" style="border:1px solid transparent;background-color:#6f1994;padding:20px 50px;">Bandar Lampung</a>                     
                    </div>
                    <div class="col" style="margin:10px;">
                    <a href="" class="btn btn-primary btn-responsive-2" style="border:1px solid transparent;background-color:#6f1994;padding:20px 50px;">Bandar Lampung</a>                     
                    </div>
                    <div class="col" style="margin:10px;">
                    <a href="" class="btn btn-primary btn-responsive-2" style="border:1px solid transparent;background-color:#6f1994;padding:20px 50px;">Bandar Lampung</a>                     
                    </div>
                    <div class="col" style="margin:10px;">
                    <a href="" class="btn btn-primary btn-responsive-2" style="border:1px solid transparent;background-color:#6f1994;padding:20px 50px;">Bandar Lampung</a>                     
                    </div>
                    <div class="col" style="margin:10px;">
                    <a href="" class="btn btn-primary btn-responsive-2" style="border:1px solid transparent;background-color:#6f1994;padding:20px 50px;">Bandar Lampung</a>                     
                    </div>
                    <div class="col" style="margin:10px;">
                    <a href="" class="btn btn-primary btn-responsive-2" style="border:1px solid transparent;background-color:#6f1994;padding:20px 50px;">Bandar Lampung</a>                     
                    </div>
                    <div class="col" style="margin:10px;">
                    <a href="" class="btn btn-primary btn-responsive-2" style="border:1px solid transparent;background-color:#6f1994;padding:20px 50px;">Bandar Lampung</a>                     
                </div>
           </div>
        </div>
    </div>
</div>
<!--Kota END-->

<!--KAMPUS-->
<divborder:1px solid transparent; class="kampus wrapper">
    <div class="container">

    <!-- <div class="bullet-box-header" data-aos="fade-zoom-in" data-aos-once="true"> -->
        <h3 data-aos="fade-zoom-in" data-aos-once="true" style="text-align:center;" class="card-banner-title">Sekitar Kampus</h3>
        <p data-aos="fade-zoom-in" data-aos-once="true" style="text-align:center;" class="card-text">Cari Kostan tempat KAMPUS idamanmu</p>
    <!-- </div> -->
    <br><br>
                                    
    <div class="row text-xs-center" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-once="true">
                <ul class="list-group col-md-6 col-lg-2">
                    <div class="li-title"><b>Bandar Lampung</b></div>
                    <li><a href="{{ url('map?alamat=Universitas Lampung&amp&amp;lat=-5.3647252&amp;long=105.2429295') }}">Kost Dekat UNILA</a></li>
                    <li><a href="{{ url('map?alamat=Institut Teknologi Sumatera&amp;lat=-5.3578823&amp;long=105.3143222') }}">Kost Dekat ITERA</a></li>
                    <li><a href="{{ url('map?alamat=Politeknik Negeri Lampung&amp;lat=-5.3579355&amp;long=105.232846') }}">Kost Dekat POLINELA</a></li>
                    <li><a href="{{ url('map?alamat=Poltekes Tanjung karang&amp;lat=-5.358734&amp;long=105.248923') }}">Kost Dekat POLTEKES</a></li>
                    <li><a href="{{ url('map?alamat=Perguruan Tinggi Teknokrat&amp;lat=-5.3824842&amp;long=105.2577508') }}">Kost Dekat TEKNOKRAT</a></li>
                    <li><a href="{{ url('map?alamat=IBI Darmajaya&amp;lat=-5.3776446&amp;long=105.2499227') }}">Kost Dekat IBI DARMAJAYA</a></li>
                    <li><a href="{{ url('map?alamat=Perguruan Tinggi Mitra Lampung&amp;lat=-5.3730637&amp;long=105.241406') }}">Kost Dekat UMITRA</a></li>
                    <li><a href="{{ url('map?alamat=Universitas Malahayati&amp;lat=-5.3795717&amp;long=105.2192201') }}">Kost Dekat MALAHAYATI</a></li>
                    <li><a href="{{ url('map?alamat=Universitas Bandar Lampung&amp;lat=-5.3795338&amp;long=105.2517045') }}">Kost Dekat UBL</a></li>
                    <li><a href="{{ url('map?alamat=Sekolah Tinggi Keguruan Dan Ilmu Pendidikan STKIP PGRI&amp;lat=-5.4200659&amp;long=105.245093') }}">Kost Dekat STKIP PGRI</a></li>
                </ul>

        </div>
    </div>
</div>
<!--KAMPUS END-->
@endsection('content')
