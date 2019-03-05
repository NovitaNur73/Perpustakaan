<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MKategori;
use App\MGlobal;

class KategoriControl extends Controller
{
    //
    function index(){
        $kategori = MKategori::All();

        return view('data.data_kategori',compact('kategori'));
    }

    function add(){
        $kategori = MGlobal::Get_Row_Empty('tb_kategori');
        return view('form.frm_kategori',compact('kategori'));
    }

    function edit($id_kategori){
        $kategori = MKategori::where("id_kategori",$id_kategori)->first();
        return view('form.frm_kategori',compact('kategori'));
    }

    function save(Request $req){
        // echo $req;
        if($req->get('id_kategori')==""){
        //Simpanke tabel penerbit
        $kategori = new MKategori([

            'nama_kategori'          => $req->get('nama_kategori')
        ]);
        $kategori->save();
        } else {

            $kategori = MKategori::where("id_kategori",$req->get('id_kategori'));
            $kategori->update([
            
            'nama_kategori'             => $req->get('nama_kategori')
            ]);
        }

    //Upload stelah data tersimpan

    return redirect('kategori');

    }

    function destroy($id_kategori){
        $kategori = MKategori::where("id_kategori",$id_kategori);
        $kategori->delete();

        return redirect('kategori')->with('success', 'Stock has been deleted Successfully');
    }
}
