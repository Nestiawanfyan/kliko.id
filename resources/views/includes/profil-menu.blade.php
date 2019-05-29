<div class="list-group side-nav">
  <!-- <a href="#" class="list-group-item">Ringkasan Akun</a> -->
  <a href="{{ route('kost.saya') }}" class="color-mn-acc list-group-item {{ (Route::is('kost.saya')) ? 'active' : ''}}">Kost</a>
  <a href="{{ route('tambah') }}" class="color-mn-acc list-group-item {{ (Route::is('tambah')) ? 'active' : ''}}">Tambah Kost</a>
  <a href="{{ route('tambahKlipritn') }}" class="color-mn-acc list-group-item {{ (Route::is('tambahKlipritn')) ? 'active' : ''}}">Tambah Kliprint</a>
  <a href="{{ route('profil.settings')}}" class="color-mn-acc list-group-item {{ (Route::is('profil.settings')) ? 'active' : ''}}">Pengaturan Akun</a>
</div>
