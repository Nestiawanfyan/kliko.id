@extends('layouts.master')

@section('title')
Administrator
@endsection('title')

@section('title-content')
Administrator
@endsection('title-content')

@section('styles')
  <link rel="stylesheet" href="{{ URL::to('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection('styles')

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Administrator</a></li>
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

         @if(Session::has('failed_access'))
        <div class="callout callout-danger">
          <p>{{ Session::get('failed_access') }}</p>
        </div>
        @endif

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administrator</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                @foreach($admins as $admin)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $admin->nama }}</td>
                  <td>{{ $admin->email }}</td>
                  <td>{{ $admin->username }}</td>
                  <td>
                  <!-- Auth('user')->user()->id -->
                   
                    <?php 
                      $id_admins = Auth('admin')->user()->id;
                      if( $id_admins == $admin->id){
                    ?>
                      <a href="{{ route('admin.administrator.delete', ['id' => $admin->id]) }}" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                      <a href="{{ route('admin.administrator.edit', ['id' => $admin->id]) }}" class="btn btn-xs btn-warning" title="Edit"><i class="fa fa-pencil"></i></a>
                    <?php
                      } else {
                        echo 'None';
                      }
                    ?>
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
              <h3 class="box-title">Tambah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('admin.administrator.create') }}" enctype="multipart/form-data">
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
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control">
                  @if($errors->has('email'))
                    @foreach($errors->get('email') as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                  @endif
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control">
                  @if($errors->has('username'))
                    @foreach($errors->get('username') as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                  @endif
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control">
                  @if($errors->has('password'))
                    @foreach($errors->get('password') as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                  @endif
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="image">
                  @if($errors->has('image'))
                    @foreach($errors->get('image') as $error)
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
