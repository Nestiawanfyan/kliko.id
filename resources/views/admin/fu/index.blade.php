@extends('layouts.master')

@section('title')
Fasilitas Umum
@endsection('title')

@section('title-content')
Fasilitas Umum
@endsection('title-content')

@section('styles')
  <link rel="stylesheet" href="{{ URL::to('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection('styles')

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Fasilitas Umum</a></li>
@endsection('breadcrumb')

@section('script')
<!-- DataTables -->
<script src="{{ URL::to('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
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
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-8">

        @if(Session::has('message'))
        <div class="callout callout-info">
          <p>{{ Session::get('message') }}</p>
        </div>
        @endif

        @if(Session::has('fail'))
        <div class="callout callout-info">
          <p>{{ Session::get('fail') }}</p>
        </div>
        @endif

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Fasilitas Umum</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                @foreach($fus as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>
                    <a href="{{ route('admin.fu.delete', ['id' => $data->id]) }}" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                    <a href="{{ route('admin.fu.edit', ['id' => $data->id]) }}" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
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
              <h3 class="box-title">Tambah Fasilitas Umum</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('admin.fu.create') }}">
              <input type="hidden" name="action">
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control">
                  @if($errors->has('nama'))
                    @foreach($errors->get('nama') as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                  @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection('main-content')
