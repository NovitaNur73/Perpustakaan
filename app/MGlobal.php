<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MGlobal extends Model
{
    public static function Get_Row_Empty($table){
        $columns = DB::select('show columns from ' . $table);
        foreach($columns as $col){
            $column[$col->Field]="";
        }

        return $column;
    }

    public static function Get_Pengarang($id_pengarang){
        $pengarang = DB::table('tb_pengarang')->where('id_pengarang',$id_pengarang)->first();
        if($pengarang!=""){
            $nama = $pengarang->nama_pengarang;
        } else {
            $nama = "- Not Set -";
        }

        return $nama;
    }

    public static function Get_Penerbit($id_penerbit){
        $penerbit = DB::table('tb_penerbit')->where('id_penerbit',$id_penerbit)->first();
        if($penerbit!=""){
            $nama = $penerbit->nama_penerbit;
        } else {
            $nama = "- Not Set -";
        }

        return $nama;
    }

    public static function Get_Kategori($id_kategori){
        $kategori = DB::table('tb_kategori')->where('id_kategori',$id_kategori)->first();
        if($kategori!=""){
            $nama = $kategori->nama_kategori;
        } else {
            $nama = "- Not Set -";
        }

        return $nama;
    }
}
