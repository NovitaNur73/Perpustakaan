<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPeminjam extends Model
{
    //
    protected $table = "tb_peminjaman";    
    public $timestamps = false;
    protected $guarded = ['id_pinjam'];
}
