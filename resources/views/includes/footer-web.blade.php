<?php
use App\Kost;
$kosts = Kost::where("konfirmasi", "=", 1);
?>
<div class="footers-1">
    <div class="container">
        <!-- <div class="row">
            <div class="col-sm-6 kiri">
                <h3 style="font-family: 'Didact Gothic', sans-serif;">Kliko<small>Cari Kost Murah di Bandar Lampung dan sekitarnya</small></h3>
            </div>
            <div class="col-sm-6 text-sm-right kanan">
                <h4>{{ $kosts->count() }}<small>Kost Sudah Terdaftar</small></h4>
            </div>
        </div> -->
        <div class="center">
            <h3 data-aos="fade-zoom-in" data-aos-once="true" style="text-align:center;" class="card-banner-title">Kliko - Aplikasi Pencari Kost Di Indonesia</h3>
            <p data-aos="fade-zoom-in" data-aos-once="true" style="text-align:center;" class="card-text">Download Aplikasinya yang tersedia di </p>
                
                <li data-aos="fade-zoom-in" data-aos-once="true" class="nav-item" style="text-align:center;">
                    <a data-toggle="modal" data-target="#coming-soon-apk"><img src="{{ asset('img/picture/google-play-badge.png') }}" alt="Google Play Badge" width="200px" height="60px"></a>
                </li>

        </div>
    </div>
</div>
<div class="footers text-xs-center text-md-center" style="margin:2em auto;">
    <div class="container">
        <div class="center">
            <h4 data-aos="fade-zoom-in" data-aos-once="true"  class="logo-KLIKO" style="text-align:center;">
                <img src="{{ asset('img/kliko/Kliko-Logo.png') }}" width="105" alt="Kliko - Logo">
            </h4>
            <p data-aos="fade-zoom-in" data-aos-once="true"  class="footer-text">
                Dapatkan Kamar Kost/ Kontrakan/ Bedeng di tempat yang kamu inginkan hanya di <br> <span style="font-family: 'Baloo Bhaina', cursive;font-size:20px;"> Kliko.id</span>
            </p>
            <div class="social-media">
                <a href="#" target="_blank" class="fa fa-facebook-square" style="color:#3b5998;"></a>
                <a href="#" target="_blank" class="fa fa-instagram" style="color:#e95950;"></a>
            </div> 
            <p style="margin-top:1.5em;font-size:14px;font-family: 'Titillium Web', sans-serif;">
                <span class="fa fa-envelope" style="margin:0 3px;color:#6f1994;font-size:17px;"> </span>kliko.official@gmail.com 
                <span class="fa fa-whatsapp" style="margin:0 3px;color:#6f1994;font-size:17px;"> </span>+62 852-1640-0646
            </p>
        </div>   
    </div>
</div>
<!-- <div class="footer-copyright wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-xs-center text-sm-left">&copy; {{ date('Y') }} <a href="" style="color:#bdbdbd;font-family: 'Didact Gothic', sans-serif;             font-size:14px;">Kliko - Bandar Lampung</a></div>
        </div>
    </div>
</div> -->
<!-- 

<div class="row">
            <!-- <div class="col-md-8 footer-item">
            <h4>TENTANG KLIKO</h4>
            <p>KLIKO adalah sebuah situs web yang menyajikan informasi kost yang berada di wilayah Bandar Lampung dan sekitarnya.
            Informasi kos yang ada di KLIKO sudah kami verifikasi, kami sudah melakukan survei ke rumah kos yang telah terdaftar di website ini.
            Anda bisa mendapatkan berbagai informasi terkait rumah kos yang Anda inginkan seperti lokasi, fasilitas, harga sewa, dll.</p>
        </div> 
        <div class="col-md-5 footer-item">
            <h4 class="logo-KLIKO">
                <img src="{{ asset('img/kliko/Kliko-WhiteLogo.png') }}" width="85" height="55" alt="Kliko - Logo">
            </h4>
              <p>Kliko adalah sebuah situs web yang menyajikan informasi kost yang berada di wilayah Bandar Lampung dan sekitarnya.</p>
        </div>
        <div class="col-md-1">

        </div>

        <div class="col-md-4 footer-item">
            <h4>Call Center</h4>
            <div class="list-group">
                <span href="#">No Telp/WA : +62 852-1640-0646</span>
                <span href="mailto:info@KLIKO.com">Email : kliko.offical@gmail.com</span>
            </div>
            <div class="social-media">
                <a href="#" target="_blank" class="fa fa-facebook-square"></a>
                <a href="#" target="_blank" class="fa fa-instagram"></a>
            </div>                                                                                          
        </div>
    </div> -->

    <!-- Modal Login -->
<div class="modal fade" id="coming-soon-apk" tabindex="-1" role="dialog" aria-labelledby="loginUsermodel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Login User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
    <div class="modal-body">
        <p style="text-align:center;font-size:40px;font-family: 'Baloo Bhaina', cursive;margin-top:20px;">Oops Sorry...</p>
        <p style="text-align:center;font-size:25px;font-family: 'Baloo Bhaina', cursive;margin-top:20px;">Coming Soon</p>
    </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>