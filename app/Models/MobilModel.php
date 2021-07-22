<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class MobilModel extends Model
{
  //menampilkan semua data
  public function allData(){

    return DB::table('tbl_mobil')->get();
    //  return [
    //       [
    //         'id'=>'1234',
    //         'merek'=>'Honda',
    //         'warna'=>'Hitam'
    //       ],
    //       [
            
    //         'id'=>'1111',
    //         'merek'=>'Toyota',
    //         'warna'=>'Silver'
    //       ],
    //       [ 
    //         'id'=>'2222',
    //         'merek'=>'Suzuki',
    //         'warna'=>'Biru'
    //       ]
    //     ];
  }  
  //menampilkan data berdasarkan id
  public function detailData($id_mobil){
      return $user = DB::table('tbl_mobil')
      ->where('id_mobil', $id_mobil)
      ->first();
  }
  //menambahkan data (insert into)
  public function tambahData ($data){
    DB::table('tbl_mobil')->insert($data);
  }

  //mengupdate data (update )
  public function editData ($id_mobil,$data){
    DB::table('tbl_mobil')
    ->where('id_mobil', $id_mobil)
    ->update($data);
  }

  //menghapus data (delete)
  public function deleteData ($id_mobil){
    DB::table('tbl_mobil')
    ->where('id_mobil', $id_mobil)
    ->delete();
  }
}
