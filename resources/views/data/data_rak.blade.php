@extends('template')

@section('judul')
Data Anggota
@stop

@section('ac-rak')
active
@stop

@section('content')

<div class="box">
  <div class="box-header">
    <a href="{{ url('rak/add') }}"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Singkatan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($rak as $rsRak)
        <tr>
            <td>{{ $rsRak['id_rak'] }}</td>
            <td>{{ $rsRak['nama_rak'] }}</td>
            <td>{{ $rsRak['singkatan'] }}</td>
            <td>
            <a href="{{ url('rak/edit/'.$rsRak['id_rak']) }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
            <a href="{{ url('rak/hapus/'.$rsRak['id_rak']) }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop