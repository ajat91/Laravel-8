@extends('layouts.v_template')
@section('title','Detail Mobil')

@section('content')

<table class="table">
    <tr>
        <th width="100px">Id Mobil</th>
        <th width="30px">:</th>
        <th>{{ $mobil->id_mobil }}</th>
    </tr>
    <tr>
        <th width="100px">Kode Mobil</th>
        <th width="30px">:</th>
        <th>{{ $mobil->kode }}</th>
    </tr>
    <tr>
        <th width="100px">Merek Mobil</th>
        <th width="30px">:</th>
        <th>{{ $mobil->merek }}</th>
    </tr>
    <tr>
        <th width="100px">Warna</th>
        <th width="30px">:</th>
        <th>{{ $mobil->warna }}</th>
    </tr>
    <tr>
        <th width="100px">Harga</th>
        <th width="30px">:</th>
        <th>{{ $mobil->harga }}</th>
    </tr>
    <tr>
        <th width="100px">Gambar</th>
        <th width="30px">:</th>
        <th><img src="{{ url('fotoMobil/'.$mobil->gambar) }}" alt="" width="50"></th>
    </tr>
    <tr>
        <th>
            <a href="/mobil" class="btn btn-success">Kembali</a>
        </th>
    </tr>
</table>

@endsection