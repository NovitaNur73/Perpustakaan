@extends('template')

@section('judul')
Data Penerbit
@stop

@section('ac-penerbit')
active
@stop

@section('content')

<div class="box">
  <div class="box-header">
    <a href="{{ url('penerbit/add') }}"><button type="button" class="btn bg-green btn-flat margin">Add New</button></a>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Penerbit</th>
          <th>Alamat</th>
          <th>Kota</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($penerbit as $rsPen)
        <tr>
            <td>{{ $rsPen['id_penerbit'] }}</td>
            <td>{{ $rsPen['nama_penerbit'] }}</td>
            <td>{{ $rsPen['alamat'] }}</td>
            <td>{{ $rsPen['kota'] }}</td>
            <td>{{ $rsPen['email'] }}</td>
            <td>
            <a href="{{ url('penerbit/edit/'.$rsPen['id_penerbit']) }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
            <a href="{{ url('penerbit/hapus/'.$rsPen['id_penerbit']) }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop