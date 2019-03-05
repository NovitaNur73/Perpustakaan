@extends('template')

@section('judul')
Data Pengarang
@stop

@section('ac-pengarang')
active
@stop

@section('content')

<div class="box">
  <div class="box-header">
    <a href="{{ url('pengarang/add') }}"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Kota</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($pengarang as $rsPeng)
        <tr>
            <td>{{ $rsPeng['id_pengarang'] }}</td>
            <td>{{ $rsPeng['nama_pengarang'] }}</td>
            <td>{{ $rsPeng['alamat'] }}</td>
            <td>{{ $rsPeng['kota'] }}</td>
            <td>{{ $rsPeng['email'] }}</td>
            <td>
            <a href="{{ url('pengarang/edit/'.$rsPeng['id_pengarang']) }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
            <a href="{{ url('pengarang/hapus/'.$rsPeng['id_pengarang']) }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop