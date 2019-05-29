@extends('layouts.master')

@section('title')
Kost
@endsection('title')

@section('title-content')
Update Data Kost
@endsection('title-content')

@section('styles')
  <link rel="stylesheet" href="{{ URL::to('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection('styles')

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Kost</a></li>
  <li><a href="#">Update</a></li>
@endsection('breadcrumb')

@section('script')
<!-- DataTables -->
<script src="{{ URL::to('asset-backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('asset-backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection('script')


@section('main-content')
    <!-- Main content -->
    <section class="content"><br>

        <div class="row">

            <div class="col-xs-12 col-md-8">
                @if(Session::has('message_pemilik'))
                    <div class="callout callout-success">
                        <p>{{ Session::get('message_pemilik') }}</p>
                    </div>
                @endif
                @if(Session::has('message_kost'))
                    <div class="callout callout-success">
                        <p>{{ Session::get('message_kost') }}</p>
                    </div>
                @endif
                @if(Session::has('message_sewa'))
                    <div class="callout callout-success">
                      <p>{{ Session::get('message_sewa') }}</p>
                    </div>
                @endif
                @if(Session::has('message_fasilitas'))
                <div class="callout callout-success">
                  <p>{{ Session::get('message_fasilitas') }}</p>
                </div>
                @endif
            </div>

            <div class="col-xs-12 col-md-8" style="background-color:#ffffff;padding:30px;box-shadow:2px 10px 10px 0px #e4e4e4;margin:20px;">
                <div class="callout callout-info">
                    Pemilik/Pengelola Kost
                </div>

                <form class="col-md-11" action="{{ route('admin.kost.updatePemilik' , ['id' => $kosts->id]) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="row">
                        <div class="form-group" id="namaPemilik">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Nama Pemilik/Pengelola*
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="text" class="form-control" oninput="validasiNamaPemilik()" onblur="validasiNamaPemilik()" name="namaPemilik" placeholder="Isi Nama Pemilik Kost" value="{{ $kosts->namaPemilik }}" requiresd>
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
                                    <input type="text" value="{{ $kosts->telpPemilik }}"  class="form-control" oninput="validasiTelpPemilik()" onblur="validasiTelpPemilik()" name="telpPemilik" placeholder="08xxxxxx" requiresd>
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
                                    <input type="text" value="{{ $kosts->alamatPemilik }}" class="form-control" oninput="validasiAlamatPemilik()" onblur="validasiAlamatPemilik()" name="alamatPemilik" placeholder="Alamat Lengkap Pemilik Kost" requiresd>
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
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-xs-12 col-md-8" style="background-color:#ffffff;padding:30px;box-shadow:2px 10px 10px 0px #e4e4e4;margin:20px;">
                 <div class="callout callout-info">
                    Informasi Kost
                </div>

                <form class="col-md-11" action="{{ route('admin.kost.updateKost' , ['id' => $kosts->id]) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                       <div class="form-group" id="namaKost">
                        <div class="row">
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                Nama Kost*
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" value="{{ $kosts->namaKost }}" class="form-control" oninput="validasiNamaKost()" onblur="validasiNamaKost()" name="namaKost" placeholder="Isi Nama Kost" requiresd>
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
                                <div style="margin-bottom:6px;">
                                    Jenis Hunian*
                                </div>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    <div class="col-xs-6 col-md-4 form-group">
                                    <select name="id_jenis_hunian" id="jenishunianselect" class="form-control" style="width:200%;" onchange="jenisHunian()">
                                        @foreach($hunian as $jenishunian)

                                            <?php
                                                $selected = "";
                                                if($kosts->id_jenis_hunian == $jenishunian->id){
                                                    $selected = ' selected="selected" ';
                                                }
                                            ?>

                                            <option value="{{ $jenishunian->id }}" style="width:100%;"  {{ $selected }} > {{ $jenishunian->nama }} </option>
                                        @endforeach
                                        </select>
                                    </div>
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
                                <input type="text" value="{{ $kosts->alamatKost }}" class="form-control" oninput="validasiAlamatKost()" onblur="validasiAlamatKost()" name="alamatKost" placeholder="Alamat Lengkap Kost" requiresd>
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
                                <input type="text" value="{{ $kosts->posKost }}" class="form-control" oninput="validasiPosKost()" onblur="validasiPosKost()" name="kodePos" placeholder="35151" requiresd>
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
                                <input type="text" value="{{ $kosts->telpKost }}" class="form-control" oninput="validasiTelpKost()" onblur="validasiTelpKost()" name="telpKost" placeholder="08xxxxxx">
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
                                <input type="text" value="{{ $kosts->luasKamar }}" class="form-control" oninput="validasiLuasKamar()" onblur="validasiLuasKamar()" name="luasKamar" placeholder="4x3" requiresd>
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
                                <input type="text" value="{{ $kosts->jumlahKamar }}" class="form-control" oninput="validasiJumlahKamar()" onblur="validasiJumlahKamar()" name="jumlahKamar" placeholder="Jumlah Kamar Keseluruhan" requiresd>
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

                    <?php 
                        $display = "";
                        if($kosts->id_jenis_hunian == 1){
                            $display = 'style=display:block; ';
                        } else {
                            $display = 'style=display:none;';                            
                        }
                    ?>

                    <div class="form-group" id="kamarKosong" {{ $display }}>
                        <div class="row">
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                Kamar Kosong*
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" class="form-control" name="kamarKosong" value=" {{ $kosts->kamarKosong }} " placeholder="Jumlah Kamar yang kosong">
                                <div class="mssg">
                                    @if($errors->has('kamarKosong'))
                                    @foreach($errors->get('kamarKosong') as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="JenisListrik">
                    <div class="row">
                        <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                            <div style="margin-bottom:6px;">
                                Jenis Meteran Listrik*
                            </div>
                        </label>
                        <div class="col-xs-12 col-md-9">
                            <div class="row">
                                <div class="col-xs-6 col-md-4 form-group">
                                    <select name="id_jenis_listrik" id="jenisListrik" class="form-control" style="width:200%;">
                                    @foreach($jls as $jenisListrik)

                                        <?php 
                                            $selected = '';
                                            if($kosts->id_jenis_listrik == $jenisListrik->id)
                                            {
                                                $selected = 'selected="selected"';
                                            }
                                        ?>

                                        <option value="{{ $jenisListrik->id }}" style="width:100%;" {{ $selected }} > {{ $jenisListrik->nama }} </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
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
                                            <input onblur="validasiPenghuni()" name="penghuniKost" type="radio" value="p" {{ $kosts->penghuni === "Putra" ? "checked" : " "  }}>
                                            <span class="c-indicator"></span>
                                            Putra
                                        </label>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-radio">
                                            <input onblur="validasiPenghuni()" name="penghuniKost" type="radio" value="w" {{ $kosts->penghuni === "Putri" ? "checked" : " "  }}>
                                            <span class="c-indicator"></span>
                                            Putri
                                        </label>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-radio">
                                            <input onblur="validasiPenghuni()" name="penghuniKost" type="radio" value="c" {{ $kosts->penghuni === "Campur" ? "checked" : " "  }}>
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
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Lokasi*
                                </label>
                                <div class="col-xs-12 col-md-12">
                                    <input id="maps-input" style="margin-top:12px;padding:5px 30px;width:400px; " type="text" placeholder="Tulis Nama Tempat, Kampus, Sekolah, dll">
                                    <div id="map_canvas" style="height:300px;width:100%;"></div><br>
                                    <div class="row latlng">
                                        <div class="col-xs-12">
                                            <input class="MapLat latlng form-control col-xs-6 col-md-4 disabled" style="width:50%;" value="{{ $kosts->latitude }}" type="text" disabled>
                                            <input class="MapLon latlng form-control col-xs-6 col-md-4 disabled" style="width:50%;" value="{{ $kosts->longitude }}" type="text" disabled>
                                            <input name="latitude" class="MapLat latlng form-control col-xs-6 col-md-4 disabled" value="{{ $kosts->latitude }}" type="hidden">
                                            <input name="longitude" class="MapLon latlng form-control col-xs-6 col-md-4 disabled" value="{{ $kosts->longitude }}" type="hidden">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <script>
                        $(function () {
                            var lat = {{ $kosts->latitude }},
                            lng = {{ $kosts->longitude }},
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
                  <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-xs-12 col-md-8" style="background-color:#ffffff;padding:30px;box-shadow:2px 10px 10px 0px #e4e4e4;margin:20px;">
                <div class="callout callout-info">
                    Harga Sewa
                </div>

                <form class="col-md-11" action="{{ route('admin.kost.updateSewa' , ['id' => $kosts->id]) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
<!--                     <div class="form-group" id="sewaMin">
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
                                      <input type="text" value="{{ $kosts->sewaHari }}" oninput="validasiSewaHari()" onblur="validasiSewaHari()" class="form-control" name="sewaHari" placeholder="50000" aria-describedby="basic-addon1">
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
                                      <input type="text" value="{{ $kosts->sewaMinggu }}" oninput="validasiSewaMinggu()" onblur="validasiSewaMinggu()" class="form-control" name="sewaMinggu" placeholder="150000" aria-describedby="basic-addon1">
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
                                      <input type="text" value="{{ $kosts->sewaBulan }}" oninput="validasiSewaBulan()" onblur="validasiSewaBulan()" class="form-control" name="sewaBulan" placeholder="500000" aria-describedby="basic-addon1">
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
                                      <input type="text" value="{{ $kosts->sewaTahun }}" oninput="validasiSewaTahun()" onblur="validasiSewaTahun()" class="form-control" name="sewaTahun" placeholder="4000000" aria-describedby="basic-addon1" requiresd>
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
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-xs-12 col-md-8" style="background-color:#ffffff;padding:30px;box-shadow:2px 10px 10px 0px #e4e4e4;margin:20px;">
                <div class="callout callout-info">
                    Fasilitas
                </div>

                <form class="col-md-11" action="{{ route('admin.kost.updateFasilitas' , ['id' => $kosts->id]) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="form-group" id="fKhusus">
                        <div class="row">
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                <div style="margin-bottom:6px;">
                                    Fasilitas Khusus
                                </div>
                                <small style="font-size:11px;">Fasilitas untuk khusus untuk pribadi</small>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    @foreach($fks as $fk)

                                        <?php
                                            $check = "";
                                            foreach($kosts->kostFK as $fK) {
                                                if($fk->id == $fK->id) {
                                                    $check = "checked";
                                                }
                                            }
                                        ?>

                                        <div class="col-xs-6 col-md-4">
                                            <label class="c-input c-checkbox">
                                            <input type="checkbox" name="fKhusus[]" value="{{ $fk->id }}" {{ $check }}><span class="c-indicator"></span>{{ $fk->nama }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row fas-lain">
                                    <div class="col-xs-12" style="margin-top:12px;">
                                        <label>Fasilitas Khusus Lainnya</label>
                                              <!-- <small>(Pisahkan dengan tanda koma ",")</small> -->
                                        <input type="text" class="form-control" placeholder="Pisahkan dengan tanda koma ' , '" name="fKhususLain" value="{{ $kosts->fKhusus }}">
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group" id="fUmum">
                        <div class="row">
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                <div style="margin-bottom:6px;">
                                    Fasilitas Umum
                                </div>
                                <small style="font-size:11px;">Fasilitas yang bisa digunakan bersama penghuni kost lain</small>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    @foreach($fus as $fu)
                                        <?php
                                            $check = "";
                                            foreach($kosts->kostFU as $fum) {
                                                if($fum->id == $fu->id) {
                                                    $check = "checked";
                                                }
                                            }
                                        ?>
                                        <div class="col-xs-6 col-md-4">
                                            <label class="c-input c-checkbox">
                                            <input type="checkbox" name="fUmum[]" value="{{ $fu->id }}" {{ $check }} ><span class="c-indicator"></span>{{ $fu->nama }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row fas-lain">
                                    <div class="col-xs-12" style="margin-top:12px;">
                                        <label>Fasilitas Umum Lainnya</label>
                                                  <!-- <small>(Pisahkan dengan tanda koma ",")</small> -->
                                        <textarea class="form-control" name="fUmumLain" placeholder="Pisahkan dengan tanda koma ' , '" rows="3"> {{ $kosts->fUmum }} </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group" id="fLingkungan">
                        <div class="row">
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                <div style="margin-bottom:6px;">
                                    Akses Lingkungan
                                </div>
                                <small style="font-size:11px;">Sarana dan prasarana yang ada di lingkungan sekitar kost</small>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    @foreach($fls as $fl)
                                        <?php
                                            $check = "";
                                            foreach($kosts->kostFL as $fln) {
                                                if($fln->id == $fl->id) {
                                                    $check = "checked";
                                                }
                                            }
                                        ?>
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-checkbox">
                                            <input type="checkbox" name="fLingkungan[]" value="{{ $fl->id }}" {{ $check }} ><span class="c-indicator"></span>{{ $fl->nama }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row fas-lain">
                                    <div class="col-xs-12" style="margin-top:12px;">
                                        <label>Akses Lingkungan Lainnya</label>
                                                      <!-- <small>(Pisahkan dengan tanda koma ",")</small> -->
                                        <textarea class="form-control" name="fLingkunganLain" placeholder="Pisahkan dengan tanda koma ' , '" rows="3"> {{ $kosts->fLingkungan }} </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group" id="fKamarMandi">
                        <div class="row">
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                <div style="margin-bottom:6px;">
                                    Kamar Mandi
                                </div>
                                <small style="font-size:11px;">Fasilitas untuk kamar mandi</small>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    @foreach($fkms as $fkm)
                                        <?php
                                            $check = "";
                                            foreach($kosts->kostFKM as $fkms) {
                                                if($fkms->id == $fkm->id) {
                                                    $check = "checked";
                                                }
                                            }
                                        ?>
                                        <div class="col-xs-6 col-md-4">
                                            <label class="c-input c-checkbox">
                                             <input type="checkbox" name="fKamarMandi[]" value="{{ $fkm->id }}" {{ $check }} ><span class="c-indicator"></span>{{ $fkm->nama }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row fas-lain">
                                    <div class="col-xs-12" style="margin-top:12px;">
                                        <label>Fasilitas Kamar Mandi Lainnya</label>
                                                          <!-- <small>(Pisahkan dengan tanda koma ",")</small> -->
                                        <textarea class="form-control" name="fMandiLain" placeholder="Pisahkan dengan tanda koma ' , '" rows="3">{{ $kosts->fKamarMandi }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group" id="parkir">
                        <div class="row">
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                Parkir
                            </label>
                        <div class="col-xs-12 col-md-9">
                            <div class="row">
                                @foreach($parkirs as $parkir)
                                    <?php
                                        $check = "";
                                        foreach($kosts->kostParkir as $pkr) {
                                            if($pkr->id == $parkir->id) {
                                                $check = "checked";
                                            }
                                        }
                                    ?> 
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-checkbox">
                                            <input type="checkbox" name="parkir[]" value="{{ $parkir->id }}" {{ $check }} ><span class="c-indicator"></span>{{ $parkir->nama }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div><br>
                    <div class="form-group" id="catatan">
                        <div class="row">
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                <div style="margin-bottom:6px;">
                                                    Deskripsi
                                </div>
                                <small style="font-size:11px;">Jelaskan semua hal tentang kosan Anda.</small>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <textarea class="form-control" name="catatan" rows="3"> {{ $kosts->catatan   }} </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div> <!-- Bagian div row = 1 -->

<!--         <div class="col-xs-12 col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit</h3>
                </div><br> 
                <a href="{{ route('admin.kost.create') }}" style="width:230px;margin:0 auto;" class="btn btn-block btn-primary">Pemilik/Pengelola Kost</a> <br>
                <a href="{{ route('admin.kost.create') }}" style="width:230px;margin:0 auto;" class="btn btn-block btn-primary">Informasi Kost</a> <br>
                <a href="{{ route('admin.kost.create') }}" style="width:230px;margin:0 auto;" class="btn btn-block btn-primary">Harga Sewa</a> <br>
                <a href="{{ route('admin.kost.create') }}" style="width:230px;margin:0 auto;" class="btn btn-block btn-primary">Fasilitas</a> <br>
                <a href="{{ route('admin.kost.create') }}" style="width:230px;margin:0 auto;" class="btn btn-block btn-primary">Fasilitas</a> <br>
            </div>
        </div> -->
      </div>
    </section>
    <!-- /.content -->
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
@endsection('main-content')
