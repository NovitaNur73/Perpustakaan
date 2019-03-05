@extends('template')

@section('judul')
Data Kategori
@stop

@section('ac-kategori')
active
@stop

@section('content')
 
 <div class="box">
    <div class="box-header">
      <a href="{{url('kategori/add')}}"><button type="button" class="btn bg-green btn-flat margin">ADD NEW</button></a>
    </div>
    <div class="box-body">
    <table id="DT" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <!--tampil data-->
            @foreach($kategori as $rsKategori)
                <tr>
                    <td>{{ $rsKategori->id_kategori }}</td>
                    <td>{{ $rsKategori->nama_kategori }}</td>
                    <td>
                        <a  href="{{ url('kategori/delete',$rsKategori->id_kategori) }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 </div>
@stop