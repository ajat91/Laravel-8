<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MobilModel;

class MobilController extends Controller
{
    
    public function __construct()
    {
        $this->MobilModel= new MobilModel();
        $this->middleware('auth');
    }
    //function menampilkan semua data
    public function index(){
        $data=[
            'mobil'=>$this->MobilModel->allData(),
        ];
        return view('v_mobil',$data);
    }
    //menampilkan data berdasarkan id tertentu
    public function detail($id_mobil){
        if(!$this->MobilModel->detailData($id_mobil)){
            abort(404);
        }
        $data=[
            'mobil'=>$this->MobilModel->detailData($id_mobil),
        ];
        return view('layouts.v_detailmobil',$data);
    }

    //function routing ke halaman add data
    public function add(){
        return view('layouts.v_addmobil');
    }

    //menyimpan data ke database (insert into)
    public function insert(){
        Request()->validate([
            'kode' => 'required|unique:tbl_mobil,kode|max:5 | min:2',
            'merek'=>'required',
            'warna' => 'required',
            'harga' => 'required',
            'gambar' => 'required|mimes:jpeg,jpg,png|max:1024'
        ]
        ,[
            'kode.required'=>'Wajib diisi',
            'kode.unique'=>'Nip sudah terdaftar',
            'kode.min'=>'Min 4 karakter',
            'kode.max'=>'Max 5 karakter',
            'merek.required'=>'Wajib diisi',
            'warna.required'=>'Wajib diisi',
            'harga.required'=>'Wajib diisi',
            'gambar.required'=>'Wajib diisi'
        ]);
        $file=Request ()->gambar;
        $fileName=Request()->kode.'.'.$file->extension();
        $file->move(public_path('fotoMobil'),$fileName);
        $data=[
            'kode'=>Request()->kode,
            'merek'=>Request()->merek,
            'warna'=>Request()->warna,
            'harga'=>Request()->harga,
            'gambar'=>$fileName,
        ];
        $this->MobilModel->tambahData($data);
        return redirect()->route('mobil')->with('pesan','Data Berhasil Ditambahkan');
    }

    //mengarahkan halaman ke halaman edit data dengan membawa id
    public function edit($id_mobil){
        if(!$this->MobilModel->detailData($id_mobil)){
            abort(404);
        }
        $data=[
            'mobil'=>$this->MobilModel->detailData($id_mobil),
        ];
        return view('layouts.v_editmobil',$data);
    }

    //mengupdate data berdasarkan id tertentu
    public function update($id_mobil){
        Request()->validate([
            'kode' => 'required|max:5 | min:2',
            'merek'=>'required',
            'warna' => 'required',
            'harga' => 'required',
            'gambar' => 'mimes:jpeg,jpg,png|max:1024'
        ]
        ,[
            'kode.required'=>'Wajib diisi',
            'kode.min'=>'Min 4 karakter',
            'kode.max'=>'Max 5 karakter',
            'merek.required'=>'Wajib diisi',
            'warna.required'=>'Wajib diisi',
            'harga.required'=>'Wajib diisi',
        ]);

        if(Request ()->gambar != ""){
            //jika ganti foto
            $file=Request ()->gambar;
            $fileName=Request()->kode.'.'.$file->extension();
            $file->move(public_path('fotoMobil'),$fileName);
            $data=[
                'kode'=>Request()->kode,
                'merek'=>Request()->merek,
                'warna'=>Request()->warna,
                'harga'=>Request()->harga,
                'gambar'=>$fileName,
            ];
            $this->MobilModel->editData($id_mobil,$data);
        }else{
            //jika tidak ganti foto
             $data=[
                'kode'=>Request()->kode,
                'merek'=>Request()->merek,
                'warna'=>Request()->warna,
                'harga'=>Request()->harga,
            ];
            $this->MobilModel->editData($id_mobil,$data);
        }
        return redirect()->route('mobil')->with('pesan','Data Berhasil Diubah');
    }
    //menghapus data
    public function delete($id_mobil){
            
        
        // $mobil=$this->MobilModel->detailData($id_mobil);
        // if($mobil->fotoMobil <>""){
        //     unlink(public_path('fotoMobil').'/'.$mobil->fotoMobil);
        // }
        // $data=[
        //     'mobil'=>$this->MobilModel->deleteData($id_mobil),
        // ];
        $this->MobilModel->deleteData($id_mobil);
        return redirect()->route('mobil')->with('pesan','Data Berhasil Dihapus');
    }
}
