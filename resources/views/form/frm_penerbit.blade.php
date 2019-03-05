@extends('template')

@section('judul')
Form Penerbit
@stop

@section('ac-penerbit')
active
@stop

@section('content')
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button><em>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </em>
    </div>
@endif
<form id="frmAnggota" class="form-horizontal" action="{{ url('penerbit/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fFrom col-md-12">
        <!-- Biodata Anggota -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Penerbit</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama Penerbit</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id_penerbit" value="{{ $penerbit['id_penerbit'] }}">
                            <input type="text" class="form-control" id="nama" placeholder="Nama Penerbit" name="nama" value="{{ $penerbit['nama_penerbit'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Alamat Penerbit" name="alamat">{{ $penerbit['alamat'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kota" class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kota" placeholder="kota" name="kota" value="{{ $penerbit['kota'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="Email Addres" name="email" value="{{ $penerbit['email'] }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">SAVE</button>
              </div>
            </div>
        </div>
    </div>
</form>
@stop