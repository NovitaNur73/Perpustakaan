<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MBuku;
use App\MKategori;
use App\MKoleksi;
use App\MRak;

class KoleksiControl extends Controller
{
    function index(){
        $koleksi = DB::select('SELECT tb_koleksi_buku.id_koleksi,tb_koleksi_buku.no_induk_buku,tb_buku.judul,tb_buku.berat,tb_koleksi_buku.tgl_pengadaan,tb_koleksi_buku.akses,tb_rak.nama_rak,tb_koleksi_buku.status FROM tb_koleksi_buku,tb_buku,tb_rak WHERE tb_koleksi_buku.id_buku = tb_buku.id_buku AND tb_koleksi_buku.id_rak=tb_rak.id_rak');
        return view('data.data_koleksi_buku',compact ('koleksi'));
    }

    function add(){
        $koleksi   = MGlobal::Get_Row_Empty('tb_koleksi_buku');
        $buku      = MBuku::all();
        $rak       = MRak::all();
        return view('form.frm_koleksi',compact('buku','koleksi','rak'));
    }

    // function edit($id){
    //     $koleksi   = MGlobal::where("id_buku",$id)->first();
    //     $buku      = MBuku::all();
    //     $rak       = MRak::all();
    //     return view('form.frm_koleksi',compact('buku','koleksi','rak'));
    // }

    function save(Request $req){
        $buku = MBuku::where('id_buku',$req->get('id_buku'))->first();
        $kategori = MKategori::where('id_kategori',$buku['id_kategori'])->first();
        
        for($i=1;$i<=$req->get('jumlah');$i++){
            //Generate no induk Buku
            $newid = DB::select('SHOW TABLE STATUS LIKE "tb_koleksi_buku"');
            $id_buku = sprintf('%04d',$req->get('id_buku'));
            $no_urut = sprintf('%06d',$newid[0]->Auto_increment);
            $no_induk_buku = "B-".$id_buku."-".$kategori['singkatan']."-".$no_urut;

        //Proses Simpan ke tabel buku
        $koleksi = new MKoleksi([

            'no_induk_buku'    => $no_induk_buku,
            'id_buku'          => $req->get('id_buku'),
            'id_user'          => 1,
            'tgl_pengadaan'    => date("Y-m-d",strtotime($req->get('tgl_pengadaan'))),
            'akses'            => $req->get('akses'),
            'id_rak'           => $req->get('id_rak'),
            'sumber'           => $req->get('sumber'),
            'status'           => $req->get('status')
        ]);
        $koleksi->save();
        }

        return redirect('koleksi');
    }

    function destroy($id){
        $buku = MKoleksi::where("id_koleksi",$id);
        $buku->delete();

        return redirect('koleksi')->with('success', 'Stock has been deleted Successfully');
    }
}