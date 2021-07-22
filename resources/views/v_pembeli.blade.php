@extends('layouts.v_template')
@section('title','Data Pembeli')

@section('content')
<a href="/penjualan/print" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-print"></i>Print</a>
<a href="/penjualan/cetakpdf" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-print"></i>Cetak Pdf</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No.HP</th>
            <th>Merek</th>
            <th>Harga</th>
            <th>Pembayaran</th>
            <th>Tenor</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach ($pembeli as $value)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->alamat }}</td>
            <td>{{ $value->no_telp }}</td>
            <td>{{ $value->merek }}</td>
            <td>{{ $value->harga }}</td>
            <td>{{ $value->type_pay }}</td>
            <td>{{ $value->tenor }}</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
    
@endsection