<?php
Use App\Foto;
?>
@extends('layouts.user')
@section('title')
Cari Kost
@endsection('title')
@section('content')

<!-- <div class="pageheader small text-xs-center"> -->
    <!-- <div class="tttt"> -->
    <div class="container" style="margin-top:40px;font-family: 'Didact Gothic', sans-serif;">
            <div class="row">
                <div class="col-xs-12 title-wrap">
                    <h1 class="title-web" style="color:#6f1994;">Cari Kost</h1>
                </div>
            </div>
        </div>
    <!-- </div> -->
<!-- </div> -->

<div class="container content-wrapper">
    <form class="filter-search" action="{{ route('kosList')}}" method="get">
        <input type="hidden" name="filter">
        <div class="filter-jenis-kost" style="margin-bottom:10px;">
            <span style="font-family: 'Bitter', serif;font-size:15px;padding-bottom:15px;">Penghuni</span>
            <select class="form-control" name="penghuni">
                <option value=""><label for="">Penghuni</label></option>
                <option value="Putra" <?php if(isset($_GET['penghuni']) && $_GET['penghuni']=="Putra") echo "selected"; ?>>Putra</option>
                <option value="Putri" <?php if(isset($_GET['penghuni']) && $_GET['penghuni']=="Putri") echo "selected"; ?>>Putri</option>
                <option value="Campur" <?php if(isset($_GET['penghuni']) && $_GET['penghuni']=="Campur") echo "selected"; ?>>Campur</option>
            </select>
        </div>
        <div class="filter-jangka-waktu">
            <span style="font-family: 'Bitter', serif;font-size:15px;margin-bottom:15px;">Jangka Waktu</span>
            <select class="form-control" name="waktu">
                <option value="hari" <?php if(isset($_GET['waktu']) && $_GET['waktu']=="hari") echo "selected"; ?>>Harian</option>
                <option value="minggu" <?php if(isset($_GET['waktu']) && $_GET['waktu']=="minggu") echo "selected"; ?>>Mingguan</option>
                <option value="bulan" <?php if(isset($_GET['waktu']) && $_GET['waktu']=="bulan") echo "selected"; ?>>Bulanan</option>
                <option value="tahun" <?php if(isset($_GET['waktu']) && $_GET['waktu']=="tahun") echo "selected"; ?>>Tahunan</option>
            </select>
        </div>
        <div class="filter-harga" style="margin-bottom:-10px;">
            <span class="value-harga value-lower" id="slider-snap-value-lower"></span>
            <span class="value-harga value-upper" id="slider-snap-value-upper"></span>
            <input type="hidden" name="min" id="min-harga">
            <input type="hidden" name="max" id="max-harga">
            <div id="slider"></div>
        </div>
        <button type="submit" class="btn btn-responsive" style="background-color:#6f1994;color:#fff;"><i class="fa fa-sliders" aria-hidden="true"></i> Cari</button>
    </form><br><br>
    <!-- <div class="col-sm">
        <button type="button" class="btn btn-primary filter-btn" style="padding:23px;background-color:#6f1994;border:1px solid #6f1994;" data-toggle="modal" data-target="#exampleModalCenter">
            Filter Pencarian
        </button>
    </div> -->
    @section("script")
    <script>
    var slider = document.getElementById('slider');
    noUiSlider.create(slider, {
        start: [
            <?php if(isset($_GET['min'])) echo $_GET['min']; else echo 0; ?>,
            <?php if(isset($_GET['max'])) echo $_GET['max']; else echo 10000000; ?>],
        snap: true,
        connect: true,
        range: {
            'min' : 0,
            '5%'  : 500000,
            '10%' : 1000000,
            '15%' : 1500000,
            '20%' : 2000000,
            '25%' : 2500000,
            '30%' : 3000000,
            '35%' : 3500000,
            '40%' : 4000000,
            '45%' : 4500000,
            '50%' : 5000000,
            '55%' : 5500000,
            '60%' : 6000000,
            '65%' : 6500000,
            '70%' : 7000000,
            '75%' : 7500000,
            '80%' : 8000000,
            '85%' : 8500000,
            '90%' : 9000000,
            '95%' : 9500000,
            'max' : 10000000
        }
    });

    var snapValues = [
        document.getElementById('slider-snap-value-lower'),
        document.getElementById('slider-snap-value-upper')
    ];

    slider.noUiSlider.on('update', function( values, handle ) {
        snapValues[handle].innerHTML = values[handle];
        document.getElementById("min-harga").value = document.getElementById('slider-snap-value-lower').innerHTML;
        document.getElementById("max-harga").value = document.getElementById('slider-snap-value-upper').innerHTML;
    });

    </script>
    @endsection
    @if($kosts->count() <= 0)
        <div class="container text-xs-center error-page text-danger">
            <div style="font-size:25px; font-weight: 300; padding-bottom: 15px;">TIDAK MENEMUKAN KOST</div>
            <div style="padding-bottom: 15px;">
                Kriteria kost yang Anda dambakan mungkin belum ada.
            </div>
        </div>
    @else
    <div class="row content">
        <div class="col-md-12">
            <h3 class="card-banner-title flaot-left" style="width:400px;display:inline-block;margin-left:-10px;">Kost Di Bandar Lampung</h3>    
            <br>
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
                
                <a class="col-md-6 col-lg-3" style="padding-right:5px;padding-left:5px;" href="{{ route('kost.view', ['kost' => $kost->seoTitle]) }}">
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
                <div class="col-md-12 text-xs-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                            {!! with(new App\Pagination\CustomPaginationLinks($kosts))->render() !!}
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <ul class="pagination pull-right">
                </ul>
            </div>
            </div>
        </div>
    </div><br>
    @endif
</div>
<!--Header END-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Filter Pencarian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form class="filter-search" action="{{ route('kosList')}}" method="get">
                <input type="hidden" name="filter">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Tipe Kost</label>
                    </div>
                    <select class="custom-select" name="penghuni" id="inputGroupSelect01">
                        <option value=""><label for="">Penghuni</label></option>
                        <option value="Putra">Putra</option>
                        <option value="Putri">Putri</option>
                        <option value="Campur">Campur</option>
                    </select>
                </div><br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Jangka Waktu</label>
                    </div>
                    <select class="custom-select" name="waktu" id="inputGroupSelect01">
                        <option value="hari">Harian</option>
                        <option value="minggu">Mingguan</option>
                        <option value="bulan">Bulanan</option>
                        <option value="tahun" selected>Tahunan</option>
                    </select>
                </div>
                <div class="filter-harga input-group mb-3">
                    <span class="value-harga value-lower" id="slider-snap-value-lower"></span>
                    <span class="value-harga value-upper" id="slider-snap-value-upper"></span>
                    <input type="hidden" name="min" id="min-harga">
                    <input type="hidden" name="max" id="max-harga">
                    <div id="slider" class="custom-range"></div>
                </div><br><br>
                <button type="submit" class="btn w-100" style="background-color:#6f1994;color:#fff;"><i class="fa fa-sliders" aria-hidden="true"></i> Filter</button>
            </form>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

@endsection('content')
