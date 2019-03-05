<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MPengarang;
use App\MGlobal;


class PengarangControl extends Controller
{
    //
    function index(){
        $pengarang = MPengarang::All();

        return view('data.data_pengarang',compact('pengarang'));
    }

    function add(){
        $pengarang = MGlobal::Get_Row_Empty('tb_pengarang');
        return view('form.frm_pengarang',compact('pengarang'));
    }

    function edit($id_pengarang){
        $pengarang = MPengarang::where("id_pengarang",$id_pengarang)->first();
        return view('form.frm_pengarang',compact('pengarang'));
    }

    function save(Request $req){
        // echo $req;
        if($req->get('id_pengarang')==""){
        //Simpanke tabel penerbit
        $pengarang = new MPengarang([

            'nama_pengarang'          => $req->get('nama_pengarang'),
            'alamat'        => $req->get('alamat'),
            'kota'        => $req->get('kota'),
            'email'         => $req->get('email')
        ]);
        $pengarang->save();
        } else {

            $pengarang = MPengarang::where("id_pengarang",$req->get('id_pengarang'));
            $pengarang->update([
            
                'nama_pengarang'          => $req->get('nama_pengarang'),
                'alamat'        => $req->get('alamat'),
                'kota'        => $req->get('kota'),
                'email'         => $req->get('email')
            ]);
        }

    //Upload stelah data tersimpan

    return redirect('pengarang');

    }

    // function update(Request $req){
    //     //Prepartion
    //     $anggota = MAnggota::where("id_anggota",$req->get("id_anggota"));
    //     $anggota->update($req->except('_token')); //Eksekusi simpan ke tabel
    //     return redirect('anggota');
    // }

    function destroy($id_pengarang){
        $pengarang = MPengarang::where("id_pengarang",$id_pengarang);
        $pengarang->delete();

        return redirect('pengarang')->with('success', 'Stock has been deleted Successfully');
    }
}