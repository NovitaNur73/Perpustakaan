@extends('template')

@section('judul')
Data Peminjam
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
          <th>No Pinjam</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
          <th>No Induk</th>
          <th>No Anggota</th>
          <th>Denda</th>
        </tr>
      </thead>
      <tbody>
      @foreach($mpinjam as $rsPin)
        <tr>
            <td>{{ $rsPin['no_pinjam'] }}</td>
            <td>{{ $rsPin['tgl_pinjam'] }}</td>
            <td>{{ $rsPin['tgl_kembali'] }}</td>
            <td>{{ $rsPin['no_induk_buku'] }}</td>
            <td>{{ $rsPin['no_anggota'] }}</td>
            <td>{{ $rsPin['denda'] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop