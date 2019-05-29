@extends('layouts.master')

@section('title')
User
@endsection('title')

@section('title-content')
User
@endsection('title-content')

@section('styles')
  <link rel="stylesheet" href="{{ URL::to('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection('styles')

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">User</a></li>
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
        <div class="col-xs-12 col-md-10">

        @if(Session::has('message'))
        <div class="callout callout-success">
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
              <h3 class="box-title">Daftar Data Pengguna Kliko</h3><br><br>
              <small><b><i>Note :</i></b> Data Terbaru akan Masuk pada Nomor pertama / paling atas. </small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="text-align:center;">No</th>
                  <th style="text-align:center;">Nama User</th>
                  <th style="text-align:center;">Email User</th>
                  <th style="text-align:center;">Foto Profile User</th>
                  <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                @foreach($users as $user)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $user->nama }}</td>
                  <td>{{ $user->email }}</td>
                  <td style="text-align:center;">
                    @if($user->foto == "")
                        <p style="text-align:center;">-</p>
                    @else

                        <img src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->foto }}" width="40px" height="40px" style="border-radius:100%;margin:0 auto;">
                    @endif
                  </td>
                  <td style="text-align:center;">
                    <a href="{{ route('admin.user.editForm', $id = ['id' => $user->id]) }}" class="btn btn-xs bg-orange " title="update"><i class="fa fa-edit"></i></a>
                    <!-- <a href="{{ route('admin.kost.hidekost', ['id' => $user->id]) }}" class="btn btn-xs btn-danger " title="Hide Kost"><i class="fa fa-eye-slash"></i></a> -->
                    <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-{{ $user->id }}" title="Delete"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">
                                    Hapus Data User
                                </h4>
                            </div>
                            <div class="modal-body">
                                Anda Yakin Ingin Menghapus User : {{ $user->nama }} ? 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                <a type="button" href="{{ route('admin.user.delete', ['$id' => $user->id]) }}" class="btn btn-danger">Hapus</a>
                            </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection('main-content')
