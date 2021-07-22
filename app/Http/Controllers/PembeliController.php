<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembeliModel;
use Dompdf\Dompdf;

class PembeliController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->PembeliModel= new PembeliModel();
    }
    public function index(){
        $data=[
            'pembeli'=>$this->PembeliModel->alldata(),
        ];
        return view('v_pembeli',$data);
    }
    public function print(){
        $data=[
            'pembeli'=>$this->PembeliModel->alldata(),
        ];
        return view('v_cetak',$data);
    }
    public function cetakpdf(){
        $data=[
            'pembeli'=>$this->PembeliModel->alldata(),
        ];
        $html= view('v_cetakpdf',$data);
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $options = $dompdf->getOptions();
        $options->setIsHtml5ParserEnabled(true);
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
            }
    
}
