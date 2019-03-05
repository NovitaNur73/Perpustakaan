<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\MMemo;
class MemoControl extends Controller
{
    //
    function index(){
        $memo = MMemo::All();

        return view('data.data_memo',compact('memo'));
    }

    function save(){

        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_memo"');

        //Simpanke tabel comment
        $memo = new MMemo([
            'id'    => $id,
            'nama'  => $req->get('nama'),
            'isi'   => $req->get('isi')
        ]);
        $memo->save();
        return redirect('memo');
    }
    //Upload stelah data tersimpan

   

    // function destroy($id_rak){
    //     $rak = MRak::where("id_rak",$id_rak);
    //     $rak->delete();

    //     return redirect('rak')->with('success', 'Stock has been deleted Successfully');
    // }
}
