<!-- header -->

<div class="banner" style="background-image:url('{{ asset('img/picture/banner-home-kliko.jpg') }}');">
    <div class="color-gradient">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="setting-banner" data-aos="fade-right">
                    <h2 class="title-banner">Kliko.id</h2>
                    <p class="content-banner">Mulai untuk mencari tempat tinggal <br> yang nyaman dan aman.</p>
                    <div class="search-banner">
                        <form action="{{ route('map') }}" method="get">
                            <div class="input-group search-wrap w-75">
                                <input type="text" id="input-maps" class="shadow-sm form-control" placeholder="Cari Kost Di Daerah yang Kamu Inginkan">
                                <input id="city" name="alamat" type="hidden"/>
                                <input id="Lat" name="lat" type="hidden" />
                                <input id="Long" name="long" type="hidden" />
                                <span class="input-group-btn" style="z-index:999;">
                                    <button class="btn btn-search pd-btn-search" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                        <p style="margin:10px 0px;color:#fff;font-family: 'Titillium Web', sans-serif;font-size:18px;">Atau dengan Menfilter Pencarianmu...</p>
                        <div class="col-md-6 col-lg-3" style="margin:10px -15px;">
                            <button type="button" class="btn btn-primary btn-responsive-2" style="padding:17px 23px;background-color:#6f1994;border:1px solid #6f1994;" data-toggle="modal" data-target="#exampleModalCenter">
                            Filter Pencarian
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-7">
                <!-- <div class="image-banner" style="background-image:url('{{ asset('img/picture/home.jpg') }}');"></div> -->
            </div>
        </div>
    </div>
    </div>
</div>

<!-- card detail Kliko.id -->
<div class="detail-kliko">
    <div class="container">
        <div class="row" style="margin-top:4em;text-align:center;">
            <div class="col-md-6 col-lg-4" style="margin:10px 0;">
                <div class="card shadow-lg" data-aos="fade-up-right" data-aos-once="false">
                    <img class="card-img-top" src="{{ asset('img/kliko/Find-home.png') }}" alt="Search Kost" style="height:15em;">
                    <div class="card-body" style="height:200px;">
                    <h5 class="card-title">Cari Kost</h5><br>
                    <p class="card-text">Cari Kost Kostan - Kontrakan - Bedeng kosong di daerah yang anda inginkan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" style="margin:10px 0;">
                <div class="card shadow-lg" data-aos="zoom-in-down">
                    <img class="card-img-top" src="{{ asset('img/kliko/Telpon.png') }}" alt="Card image cap" style="height:15em;">
                    <div class="card-body" style="height:200px;">
                    <h5 class="card-title">Hubungi Pemilik</h5><br>
                    <p class="card-text">Hubungi Pemilik Kost kostan - Kontrakan - Bedeng untuk mendapatan tempat tinggal dan informasi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4" style="margin:10px 0;">
                <div class="card shadow-lg" data-aos="fade-up-left">
                    <img class="card-img-top" src="{{ asset('img/kliko/home.png') }}" alt="Card image cap" style="height:15em;">
                    <div class="card-body" style="height:200px;">
                    <h5 class="card-title">Tempati Kost</h5><br>
                    <p class="card-text">Tempati dan nikmati fasilitas yang ada di kost kostan - Kontrakan - bedeng yang telah anda pesan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


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