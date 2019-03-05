<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MAnggota;
use App\MGlobal;

// use App\Http\Requests\AnggotaRequest;
// use App\Http\Requests\AnggotaReq;

class AnggotaControl extends Controller
{
    //
    function index(){
        $anggota = MAnggota::All();

        return view('data.data_anggota',compact('anggota'));
    }

    function add(){
        $anggota = MGlobal::Get_Row_Empty('tb_anggota');
        return view('form.frm_anggota',compact('anggota'));
    }

    function edit($id_anggota){
        $anggota = MAnggota::where("id_anggota",$id_anggota)->first();
        return view('form.frm_anggota',compact('anggota'));
    }

    function save(Request $req)
    {
        // echo $req;
        if($req->file('foto'))
        {
            $foto = $req->file('foto');
            $nama_foto = $foto->getClientOriginalName();
        } 
        else 
        {
            $nama_foto = $req->get('old_foto');
        }
        
        if($req->get('id_anggota')=="")
        {
            // Menciptakan kode anggota
            // A0001012019
            // dd(DB::table("tb_anggota")->get());
            $newid = DB::select('SHOW TABLE STATUS LIKE "tb_anggota"');
            $noanggota = "A".sprintf('%04d',$newid[0]->Auto_increment).date("mY");

            //Simpanke tabel Anggota
            $anggota = new MAnggota([

                'no_anggota'    => $noanggota,
                'nama'          => $req->get('nama'),
                'tempat'        => $req->get('tempat'),
                'tgl_lahir'     => date("Y-m-d",strtotime($req->get('tgl_lahir'))),
                'jk'            => $req->get('jk'),
                'alamat'        => $req->get('alamat'),
                'kota'          => $req->get('kota'),
                'telp'          => $req->get('telp'),
                'email'         => $req->get('email'),
                'user_name'     => $req->get('user_name'),
                'user_password' => md5($req->get('user_password')),
                'foto'          => $nama_foto,
                'status'        => 1
            ]);
            $anggota->save();
            //Upload stelah data tersimpan
            if($req->file('foto')){
                $foto->move(public_path()."/img", $nama_foto);
            } 
        } 
        else 
        {

            $anggota = MAnggota::where("id_anggota",$req->get('id_anggota'));
            $anggota->update([
            
                'nama'          => $req->get('nama'),
                'tempat'        => $req->get('tempat'),
                'tgl_lahir'     => date("Y-m-d",strtotime($req->get('tgl_lahir'))),
                'jk'            => $req->get('jk'),
                'alamat'        => $req->get('alamat'),
                'kota'          => $req->get('kota'),
                'telp'          => $req->get('telp'),
                'email'         => $req->get('email'),
                'user_name'     => $req->get('user_name'),
                'user_password' => $req->get('user_password')!="" ? md5($req->get('user_password')) : $req->get('old_password'),
                'foto'          => $nama_foto,
                'status'        => 1
            ]);
        }

        return redirect('anggota');
    }



        


    // function update(Request $req){
    //     //Prepartion
    //     $anggota = MAnggota::where("id_anggota",$req->get("id_anggota"));
    //     $anggota->update($req->except('_token')); //Eksekusi simpan ke tabel
    //     return redirect('anggota');
    // }

    function destroy($id_anggota){
        $anggota = MAnggota::where("id_anggota",$id_anggota);
        $anggota->delete();

        return redirect('anggota')->with('success', 'Stock has been deleted Successfully');
    }
}