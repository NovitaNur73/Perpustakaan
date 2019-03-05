<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MRak;
use App\MGlobal;
use App\MBuku;
use App\MKategori;
use App\MPenerbit;
use App\MPengarang;

class BukuControl extends Controller
{
    function index(){
        // $buku = DB::select('SELECT tb_buku.id_buku,tb_buku.judul,tb_buku.berat,tb_pengarang.nama_pengarang,tb_penerbit.nama_penerbit,tb_buku.tempat_terbit,tb_buku.tahun_terbit,tb_kategori.nama_kategori,tb_buku.halaman,tb_buku.edisi,tb_buku.ISBN FROM tb_buku,tb_pengarang,tb_penerbit,tb_kategori WHERE tb_buku.id_pengarang = tb_pengarang.id_pengarang AND tb_buku.id_penerbit=tb_penerbit.id_penerbit AND tb_buku.id_kategori=tb_kategori.id_kategori');
        $buku = MBuku::all();
        return view('data.data_buku',compact ('buku'));
    }

    function add(){
        $buku      = MGlobal::Get_Row_Empty('tb_buku');
        $pengarang = MPengarang::all();
        $penerbit  = MPenerbit::all();
        $kategori  = MKategori::all();
        return view('form.frm_buku',compact('buku','pengarang','penerbit','kategori'));
    }

    function edit($id){
        $buku      = MBuku::where("id_buku",$id)->first();
        $pengarang = MPengarang::all();
        $penerbit  = MPenerbit::all();
        $kategori  = MKategori::all();
        return view('form.frm_buku',compact('buku','pengarang','penerbit','kategori'));
    }

    function save(Request $req){
        //echo $req;
        if($req->file('foto')){
            $foto = $req->file('foto');
            $nama_foto = date('m-Y-').$foto->getClientOriginalName();
        } else {
            $nama_foto = $req->get('old_foto');
        }
        
        if($req->get('id_buku')==""){
        // ciptakan validasi
        // dd(DB::table("tb_buku")->get());
        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_buku"');
        $nobuku = "A".sprintf('%04d',$newid[0]->Auto_increment).date("mY");

        //Simpanke tabel buku
        $buku = new MBuku([

            'judul'            => $req->get('judul'),
            'berat'            => $req->get('berat'),
            'id_pengarang'     => $req->get('pengarang'),
            'id_penerbit'      => $req->get('penerbit'),
            'tempat_terbit'    => $req->get('tempat_terbit'),
            'tahun_terbit'     => $req->get('tahun_terbit'),
            'id_kategori'      => $req->get('kategori'),
            'halaman'          => $req->get('halaman'),
            'edisi'            => $req->get('edisi'),
            'ISBN'             => $req->get('ISBN'),
            'cover'            => $nama_foto,
            'id_rak'           => $req->get('rak'),
        ]);
        $buku->save();
    } else {

        $buku = MBuku::where("id_buku",$req->get('id_buku'));
        $buku->update([
        
            'judul'            => $req->get('judul'),
            'berat'            => $req->get('berat'),
            'id_pengarang'     => $req->get('pengarang'),
            'id_penerbit'      => $req->get('penerbit'),
            'tempat_terbit'    => $req->get('tempat_terbit'),
            'tahun_terbit'     => $req->get('tahun_terbit'),
            'id_kategori'      => $req->get('kategori'),
            'halaman'          => $req->get('halaman'),
            'edisi'            => $req->get('edisi'),
            'ISBN'             => $req->get('ISBN'),
            'cover'            => $nama_foto,
            'id_rak'           => $req->get('rak'),
        ]);
    }

    //Upload stelah data tersimpan
    if($req->file('foto')){
        $foto->move(public_path()."/img", $nama_foto);
    } 

    return redirect('buku');

    }

    // function update(Request $req){
    //     //Prepartion
    //     $buku = Mbuku::where("id_buku",$req->get("id_buku"));
    //     $buku->update($req->except('_token')); //Eksekusi simpan ke tabel
    //     return redirect('buku');
    // }

    function destroy($id){
        $buku = Mbuku::where("id_buku",$id);
        $buku->delete();

        return redirect('buku')->with('success', 'Stock has been deleted Successfully');
    }
}
