<!--Header-->
<div class="banner">
    <div class="container text-center margin-banner">

        @if(Session::has('success'))
          <div class="alert alert-success" style="color:#fff;font-size:17px;">
            {!! Session::get('success') !!}
          </div>
        @endif
        <br><br>

        <h3 class="card-banner-title">Cari Kost Di Bandar lampung</h3>

        <div class="row">
            <div class="col-11">
                <div class="row">
                <div class="col-md-6 col-lg-3" style="margin:10px 0;">
                    <a href="#">
                        <div class="card-banner shadow-sm bg-white">
                            <div class="row">
                                <div class="col-5" style="padding:0;margin:0;">
                                    <img src="{{ asset('img/picture/kamar-pria.jpg') }}" width="90px" height="70px" alt="Kamar - Pria">                                    
                                </div>
                                <div class="col-7" style="padding:0px 0;margin:0;text-align:left;line-height:20px;">
                                   <h6 style="line-height: 70px;margin-bottom:0;color:#000;font-family: 'Titillium Web', sans-serif;">Cari Kost Pria</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3" style="margin:10px 0;">
                    <a href="# ">
                        <div class="card-banner shadow-sm bg-white">
                            <div class="row">
                                <div class="col-5" style="padding:0;margin:0;">
                                    <img src="{{ asset('img/picture/girl-room.jpg') }}" width="90px" height="70px" alt="Girl -Room">                                    
                                </div>
                                <div class="col-7" style="padding:0px 0;margin:0;text-align:left;line-height:20px;">
                                   <h6 style="line-height: 70px;margin-bottom:0;color:#000;font-family: 'Titillium Web', sans-serif;">Cari Kost Putri</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3" style="margin:10px 0;">
                    <a href="# ">
                        <div class="card-banner shadow-sm bg-white">
                            <div class="row">
                                <div class="col-5" style="padding:0;margin:0;">
                                    <img src="{{ asset('img/picture/campur.jpg') }}" width="90px" height="70px" alt="Ruangan - Campur">                                    
                                </div>
                                <div class="col-7" style="padding:0px 0;margin:0;text-align:left;line-height:20px;">
                                   <h6 style="line-height: 70px;margin-bottom:0;color:#000;font-family: 'Titillium Web', sans-serif;">Cari Kost Campur</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3" style="margin:10px 0;">
                <button type="button" class="btn btn-primary btn-responsive-2" style="padding:23px;background-color:#6f1994;border:1px solid #6f1994;" data-toggle="modal" data-target="#exampleModalCenter">
                Filter Pencarian
                </button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="banner-img ">
    <div class="container">
        <div class="card bg-dark text-white img-banner" style="border:none;background-image:url({{ asset('img/picture/banner-home.jpg') }});height:45vh;">
            <div class="back-transparent">
                <div class="card-img-overlay">
                    <h5 class="card-title" style="font-family: 'Baloo Bhaina', cursive;font-size:27px;">Bergabung Dengan Kliko</h5>
                    <p class="card-text">Mulai Mencari Tempat tinggal yang nyaman, <br> dengan fasilitas yang diinginkan. Tidak perlu <br> lagi untuk keliling mencari tempat tinggal.</p>
                    <a class="btn bg-white shadow-sm" href="{{ route('register') }}" role="button" style="color:#424242;">Mulai Bergabung</a>
                    <br><br><br>
                    <img src="{{ asset('img/kliko/kliko-Logo.png') }}" width="75" height="45" alt="Kliko - Logo">                    
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