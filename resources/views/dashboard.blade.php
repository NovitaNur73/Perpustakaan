@extends('template')

@section('judul')
Dashboard
@stop

@section('subjudul')
Ini adalah Dashboard
@stop

@section('content')


    @include('content')
<!-- <button onclick="pesan('top','error','Ini adalah pesan error',1000)">CLICK ME</button> -->

<!-- <script>
$(document).ready(function(){
    pesan('bottom','success','Ini adalah pesan sukses',1500);
})
</script> -->
@stop