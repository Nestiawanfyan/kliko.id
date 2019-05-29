@extends('layouts.master')

@section('title')
Kost
@endsection('title')

@section('title-content')
Kost
@endsection('title-content')

@section('styles')
  <link rel="stylesheet" href="{{ URL::to('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection('styles')

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Kost</a></li>
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
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection('script')


@section('main-content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-8">

        @if(Session::has('message'))
        <div class="callout callout-info">
          <p>{{ Session::get('message') }}</p>
        </div>
        @endif

        @if(Session::has('message_success'))
        <div class="callout callout-success">
          <p>{{ Session::get('message_success') }}</p>
        </div>
        @endif

        @if(Session::has('fail'))
        <div class="callout callout-info">
          <p>{{ Session::get('fail') }}</p>
        </div>
        @endif

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Data Kost</h3><br><br>
              <small><b><i>Note :</i></b> Data Terbaru akan Masuk pada Nomor pertama / paling atas. </small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center;">No</th>
                  <th style="text-align:center;">User</th>
                  <th style="text-align:center;">Nama Kost</th>
                  <th style="text-align:center;">Nama Pemilik</th>
                  <th style="text-align:center;">Telp Pemilik</th>
                  <th style="text-align:center;">Konfirmasi</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                @foreach($kosts as $kost)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>
                    @foreach($users as $user)
                        @if($kost->user_id == $user->id)
                          {{ $user->nama }}
                        @endif
                    @endforeach
                  </td>
                  <td>{{ $kost->namaKost }}</td>
                  <td>{{ $kost->namaPemilik }}</td>
                  <td>{{ $kost->telpPemilik }}</td>
                  <td style="text-align:center;">
                    @if($kost->konfirmasi == 1)
                    <span class="label label-success">Terkonfirmasi</span>
                    @else
                    <a href="{{ route('admin.kost.konfirmasi', ['id' => $kost->id]) }}" class="btn btn-xs btn-warning" title="Delete"><i class="fa fa-check"></i> Konfirmasi</a>
                    @endif
                  </td>
                  <td style="text-align:center;">
                    <a href="{{ route('kost.view', ['kost' => $kost->seoTitle]) }}" class="btn btn-xs bg-green " title="View"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('admin.kost.update', ['id' => $kost->id]) }}" class="btn btn-xs bg-orange " title="update"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('admin.kost.hidekost', ['id' => $kost->id]) }}" class="btn btn-xs btn-danger " title="Hide Kost"><i class="fa fa-eye-slash"></i></a>
                    <a href="{{ route('admin.kost.delete', ['id' => $kost->id]) }}" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-xs-12 col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i>Tambah Kost</i></h3>
            </div>
            <br> <a href="{{ route('admin.kost.create') }}" style="width:230px;margin:0 auto;" class="btn btn-block btn-primary">Tambah Kost</a> <br>
          </div>
        </div>

        <div class="col-xs-12 col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i>Catatan</i></h3>
            </div>
            <div style="padding:0px 20px;">
            <br>
              <p><u>Catatan untuk aksi :</u></p>
              <p>1. Pada aksi pertama berwarna hijau dengan icon mata. Untuk melihat secara detail data kost/ Kontrakan/ Bedeng.</p>
              <p>2. Pada aksi kedua berwarna orange dengan icon edit. Untuk melakukan perubahan pada data kost/ Kontrakan/ Bedeng.</p>
              <p>3. Pada aksi ketiga berwarna merah dengan icon mata di coret. Untuk menggagalkan konfirmasi pada data kost/ Kontrakan/ Bedeng. Sehingga data tidak dapat di tampilkan di Home user Kliko</p>
              <p>4. Pada aksi keempat berwarna merah dengan icon tempat sampah. Untuk melakukan penghapusan pada data kost/ Kontrakan/ Bedeng.</p>
                <br>
              <p><u>Catatan untuk Konfirmasi : </u></p>
              <p>1. Untuk melakukan Konfirmasi akan ada Button pada bagian table konfirmasi berwarna orange. jika ingin melakukan konfirmasi, lakukan klik pada button konformasi tersebut.</p>
              <p>2. Data yang sudah di konfirmasi akan keluar sebuah text konfirmasi berwarna hijau pada bagian table konfirmasi.</p>
            <br>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection('main-content')
