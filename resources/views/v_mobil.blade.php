@extends('layouts.v_template')
@section('title','Data Mobil')

@section('content')

{{-- <h1>Data Mobil</h1>
@foreach ($mobil as $item)
    Id Mobil:{{ $item['id'] }}<br>
    Merek:{{ $item['merek'] }}<br>
    Warna:{{ $item['warna'] }}<br><br>    
@endforeach --}}

    {{-- {{ dd() }} --}}
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Berhasil!</h4>
            {{ session('pesan') }}
        </div>
    @endif
    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Id Mobil</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Merek</th>
                    <th class="text-center">Warna</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($mobil as $item)
                <tr>
                    <td>{{ $item->id_mobil }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->merek }}</td>
                    <td>{{ $item->warna }}</td>
                    <td>{{ $item->harga }}</td>
                    <td><img src="{{ url('fotoMobil/'.$item->gambar) }}" alt="" width="50"></td>
                    <td>
                        <a href="/mobil/detail/{{ $item->id_mobil }}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/mobil/edit/{{ $item->id_mobil }}" class="btn btn-sm btn-warning">Edit</a>
                        {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $item->id_mobil }}">
                            Hapus
                        </button> --}}
                        <a href="/mobil/delete/{{ $item->id_mobil }}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>  
                @endforeach
            </tbody>
    </table>
    {{-- @foreach ($mobil as $item)
    <div class="modal modal-danger fade" id="delete{{ $item->id_mobil }}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">{{ $item->merek }}</h4>
            </div>
            <div class="modal-body">
              <p>Yakin Menghapus Data??</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
              <a href="/guru/delete/{{ $item->id_mobil }}" class="btn btn-outline">Ya</a>
            </div>
        </div>
    @endforeach --}}
@endsection