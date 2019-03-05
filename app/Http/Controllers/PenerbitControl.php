<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MPenerbit;
use App\MGlobal;


class PenerbitControl extends Controller
{
    //
    function index(){
        $penerbit = MPenerbit::All();

        return view('data.data_penerbit',compact('penerbit'));
    }

    function add(){
        $penerbit = MGlobal::Get_Row_Empty('tb_penerbit');
        return view('form.frm_penerbit',compact('penerbit'));
    }

    function edit($id_penerbit){
        $penerbit = MPenerbit::where("id_penerbit",$id_penerbit)->first();
        return view('form.frm_penerbit',compact('penerbit'));
    }

    function save(Request $req){
        // echo $req;
        if($req->get('id_penerbit')==""){
        //Simpanke tabel penerbit
        $penerbit = new MPenerbit([

            'nama'          => $req->get('nama_penerbit'),
            'alamat'        => $req->get('alamat'),
            'kota'          => $req->get('kota'),
            'email'         => $req->get('email')
        ]);
        $penerbit->save();
        } else {

            $penerbit = MPenerbit::where("id_penerbit",$req->get('id_penerbit'));
            $penerbit->update([
            
                'nama'          => $req->get('nama_penerbit'),
                'alamat'        => $req->get('alamat'),
                'kota'          => $req->get('kota'),
                'email'         => $req->get('email')
            ]);
        }

    //Upload stelah data tersimpan

    return redirect('penerbit');

    }

    // function update(Request $req){
    //     //Prepartion
    //     $anggota = MAnggota::where("id_anggota",$req->get("id_anggota"));
    //     $anggota->update($req->except('_token')); //Eksekusi simpan ke tabel
    //     return redirect('anggota');
    // }

    function destroy($id_penerbit){
        $penerbit = MPenerbit::where("id_penerbit",$id_penerbit);
        $penerbit->delete();

        return redirect('penerbit')->with('success', 'Stock has been deleted Successfully');
    }
}