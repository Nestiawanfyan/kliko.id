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
                    <h1 class="title-web" style="color:#6f1994;">Kost Saya</h1>
                </div>
            </div>
        </div>
    <!-- </div> -->
<!-- </div> -->

<div class="container content-wrapper">
  <div class="row content">
    <div class="col-md-3">
      @include('includes.profil-menu')
    </div>
    <div class="col-md-9">
      @if($kosts->count() < 1)
      <div class="kost-kosong">
        <i class="icon-emotsmile"></i>
        <p>Anda belum memiliki kost<br>
          Silahkan Anda buat <a href="{{ route('tambah') }}">kost baru</a> terlebih dahulu
        </p>
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
                
                <div class="col-md-6 col-lg-3" style="padding-right:5px;padding-left:5px;">
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
                                        <a href=""></a>
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

                            <div style="text-align:center;font-family: 'Didact Gothic', sans-serif;">
                              <a href="{{ route('kost.view', ['seo' => $kost->seoTitle]) }}" class="col-xs-6 ubah" style="padding:2px 10px;color:#616161;border-radius:3px;">Lihat</a> |
                              <a href="{{ route('edit', ['seo' => $kost->seoTitle ])}}" class="col-xs-6 ubah" style="padding:2px 10px;color:#616161;border-radius:3px;">Ubah</a> |
                              <a class="col-xs-6 ubah pointer" data-toggle="modal" data-target="#delete-{{ $kost->seoTitle }}" style="padding:2px 10px;color:#616161;border-radius:3px;">Hapus</a>
                            </div>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="delete-{{ $kost->seoTitle }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">
                                            Hapus Data Kost
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        Anda Yakin Ingin Menghapus Kost : {{ $kost->seoTitle }} ? 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                        <a type="button" href="{{ route('delete', ['id' => $kost->seoTitle ])}}" class="btn btn-danger">Hapus</a>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                  </div>
                </div>
                @endforeach
                <!-- <p class="col-sm-12 text-xs-center">
                    <a href="{{ route('kosList') }}" class="btn btn-lg btn-primary">LEBIH BANYAK</a>
                </p> -->
            </div>
      @endif
      </div>
      <div class="col-md-8 col-sm-8">
        <ul class="pagination pull-right">
          {!! with(new App\Pagination\CustomPaginationLinks($kosts))->render() !!}
        </ul>
    </div>
    </div>
  </div>
</div>
<!--Header END-->

@endsection('content')
