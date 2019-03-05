<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\MBuku;
use App\User;
use Session;

class MobileControl extends Controller
{
    //
    function get_buku(){
        header("Access-Control-Allow-Origin: *");
        //Get Data Buku
        $buku = DB::select('SELECT tb_buku.*,tb_penerbit.nama_penerbit,tb_kategori.nama_kategori,tb_pengarang.nama_pengarang FROM tb_buku left join tb_pengarang on tb_buku.id_pengarang = tb_pengarang.id_pengarang left join tb_penerbit on tb_buku.id_penerbit = tb_penerbit.id_penerbit left join tb_kategori on tb_buku.id_kategori = tb_kategori.id_kategori');

        //Mapping field cover
        foreach($buku as $bk){
            $bk->cover=$bk->cover==null ? asset('/img/no-image-found.jpg') : asset('/img/'.$bk->cover);
            $data[] = $bk;
        }
        echo json_encode($data);
    }

    function get_Koleksi($id_buku){
        header("Access-Control-Allow-Origin: *");
        $koleksi = DB::select('select * from tb_koleksi_buku WHERE id_buku="'.$id_buku.'"');

        echo json_encode($koleksi);
    }

    function registrasi(Request $req){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Authorization, Content-Type' );

        $new = $req->json()->all();
        $token = csrf_token();
        $user = new User([
            "name"=>$new['name'],
            "email"=>$new['email'],
            "password"=>Hash::make($new['password']),
            "remember_token"=>$token,
            "level"=>2,
            "alamat"=>$new['alamat'],
            "telp"=>$new['telp']
        ]);

        if($user->save()){
            echo json_encode(["type"=>"success","msg"=>"Data Sukses Disimpan ! ". csrf_token()]);
        } else {
            echo json_encode(["type"=>"error","msg"=>"Data Gagal Disimpan ! ". csrf_token()]);
        }
    }

    function login(Request $req){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Authorization, Content-Type' );

        $login = $req->json()->all();

        $ceklogin = DB::table('users')->where('email',$login['email'])->first();
        if($ceklogin){
            if(Hash::check($login["password"],$ceklogin->password)){
                echo json_encode(["type"=>"success","profile"=>$ceklogin]);
            } else {
                echo json_encode(["type"=>"error","msg"=>"Password Invalid !!"]);
            }
        } else {
            echo json_encode(["type"=>"error","msg"=>"Email Invalid !!"]);
        }
    }
}