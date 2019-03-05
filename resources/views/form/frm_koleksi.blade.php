@extends('template')

@section('judul')
Form Koleksi Buku
@stop

@section('ac-buku')
active
@stop

@section('content')

<form id="frmKoleksi" class="form-horizontal" action="{{ url('koleksi/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fFoto col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Koleksi Buku</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="judul" class="col-sm-2 control-label">Buku</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_buku"  value="{{ $koleksi['id_buku'] }}">
                                <option value="">- Pilih Buku -</option>
                                @foreach($buku as $rsBuku)
                                <option value="{{ $rsBuku['id_buku'] }}">{{ $rsBuku['judul'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pengadaan" class="col-sm-2 control-label">Tanggal Pengadaan</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calender"></i></span>
                                <input id="datepicker" type="text" class="form-control" id="tgl_pengadaan" placeholder="Tanggal Pengadaan" name="tgl_pengadaan" value="{{ $koleksi['tgl_pengadaan'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="akses" class="col-sm-2 control-label">Akses</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="akses"  value="{{ $koleksi['akses'] }}">
                                <option value="">- Pilih Akses-</option>
                                <option value="Boleh Dipinjam">Boleh Dipinjam</option>
                                <option value="Boleh Baca Ditempat">Boleh Baca Ditempat</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rak" class="col-sm-2 control-label">Rak</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_rak"  value="{{ $koleksi['id_rak'] }}">
                                <option value="">- Pilih Rak -</option>
                                @foreach($rak as $rsRak)
                                <option value="{{ $rsRak['id_rak'] }}">{{ $rsRak['nama_rak'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sumber" class="col-sm-2 control-label">Sumber Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sumber" placeholder="Sumber Buku" name="sumber" value="{{ $koleksi['sumber'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status"  value="{{ $koleksi['status'] }}">
                                <option value="">- Pilih Status -</option>
                                <option value="0">Tersedia</option>
                                <option value="1">Dipinjam</option>
                                <option value="2">Rusak</option>
                                <option value="3">Hilang</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah" class="col-sm-2 control-label">Jumlah Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah" placeholder="Jumlah Buku" name="jumlah" value="">
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