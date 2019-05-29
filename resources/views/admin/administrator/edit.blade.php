@extends('layouts.master')

@section('title-content')
Administrator
@endsection('title-content')

@section('styles')
  <link rel="stylesheet" href="{{ URL::to('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection('styles')

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Anggota</a></li>
@endsection('breadcrumb')

@section('script')
@endsection('script')


@section('main-content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-4">

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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('admin.administrator.edit', ['id' => $admin->id]) }}" enctype="multipart/form-data">
              <input type="hidden" name="action">
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="{{ $admin->nama }}">
                  @if($errors->has('nama'))
                    @foreach($errors->get('nama') as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                  @endif
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="{{ $admin->email }}">
                  @if($errors->has('email'))
                    @foreach($errors->get('email') as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                  @endif
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="{{ $admin->username }}">
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
