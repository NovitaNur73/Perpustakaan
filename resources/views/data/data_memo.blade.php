@extends('template')

@section('judul')
Comments
@stop

@section('ac-dashboard')
active
@stop

@section('content')

<div class="box">
  <!-- /.box-header -->
  <div class="box-body">
    <table id="data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Isi</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($comment as $rsCmt)
        <tr>
            <td>{{ $rsCmt['id'] }}</td>
            <td>{{ $rsCmt['nama']}}</td>
            <td>{{ $rsCmt['isi']}}</td>
            <td>
            <!-- <a href="{{ url('comment/hapus/'.$rsCmt['id']) }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></ -->
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop