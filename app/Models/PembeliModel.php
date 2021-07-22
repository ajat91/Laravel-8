<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembeliModel extends Model
{
    public function allData(){

        return DB::table('tbl_pembeli')
        ->leftJoin('tbl_penjualan', 'tbl_penjualan.id_penjualan', '=', 'tbl_pembeli.id_penjualan')
        ->leftJoin('tbl_mobil', 'tbl_mobil.id_mobil', '=', 'tbl_pembeli.id_mobil')
        ->get();
      }  
}
