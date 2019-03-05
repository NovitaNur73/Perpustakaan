<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MRak;
use App\MGlobal;
use App\Http\Requests\RakRequest;

class RakControl extends Controller
{
    //
    function index(){
        $rak = MRak::All();

        return view('data.data_rak',compact('rak'));
    }

    function add(){
        $rak = MGlobal::Get_Row_Empty('tb_rak');
        return view('form.frm_rak',compact('rak'));
    }

    function edit($id_rak){
        $rak = MRak::where("id_rak",$id_rak)->first();
        return view('form.frm_rak',compact('rak'));
    }

    function save(Request $req){
        // echo $req;
        if($req->get('id_rak')==""){
        //Simpanke tabel penerbit
        $rak = new MRak([

            'nama_rak'          => $req->get('nama_rak'),
            'singkatan'     => $req->get('singkatan')
        ]);
        $rak->save();
        } else {

            $rak = MRak::where("id_rak",$req->get('id_rak'));
            $rak->update([
            
            'nama_rak'             => $req->get('nama_rak'),
            'singkatan'        => $req->get('singkatan')
            ]);
        }

    //Upload stelah data tersimpan

    return redirect('rak');

    }

    // function update(Request $req){
    //     //Prepartion
    //     $anggota = MAnggota::where("id_anggota",$req->get("id_anggota"));
    //     $anggota->update($req->except('_token')); //Eksekusi simpan ke tabel
    //     return redirect('anggota');
    // }

    function destroy($id_rak){
        $rak = MRak::where("id_rak",$id_rak);
        $rak->delete();

        return redirect('rak')->with('success', 'Stock has been deleted Successfully');
    }
}