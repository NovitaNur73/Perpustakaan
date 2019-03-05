@extends('template')

@section('judul')
Form Rak
@stop

@section('ac-rak')
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
<form id="frmPengarang" class="form-horizontal" action="{{ url('rak/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fFrom col-md-12">
        <!-- Biodata Anggota -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Rak</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id_rak" value="{{ $rak['id_rak'] }}">
                            <input type="text" class="form-control" id="nama_rak" placeholder="Nama Rak" name="nama_rak" value="{{ $rak['nama_rak'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="singkatan" class="col-sm-2 control-label">Singkatan</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="singkatan" placeholder="singkatan rak" name="singkatan" value="{{ $rak['singkatan'] }}">
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