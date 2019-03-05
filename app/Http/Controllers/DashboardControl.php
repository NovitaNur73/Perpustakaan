<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MBuku;
use App\MGlobal;
use App\MPeminjam;
use App\MAnggota;
use App\MKoleksi;
use App\Http\Requests\DashboardRequest;

class DashboardControl extends Controller
{
    //
    function index(){
        $buku = DB::select('select count(*) as jumlah from tb_buku');
        $jumlahbuku = $buku[0]->jumlah;
        $anggota = DB::select('select count(*) as jumlah from tb_anggota');
        $jumlahanggota = $anggota[0]->jumlah;
        $pinjam = DB::select('select count(*) as jumlah from tb_peminjaman');
        $jumlahpinjam = $pinjam[0]->jumlah;
        return view('dashboard', compact('jumlahbuku','jumlahanggota','jumlahpinjam'));
        
    }
    function tampil(){
        $mpinjam = MPeminjam::All();
        // dd($mpinjam);
        return view('data.data_pinjam',compact('mpinjam'));
    }
}
