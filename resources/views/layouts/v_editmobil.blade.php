@extends('layouts.v_template')
@section('title','Edit Data Mobil')

@section('content')
<form action="/mobil/update/{{ $mobil->id_mobil }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="kode">Kode Mobil</label>
                        <input type="text" name="kode" class="form-control" value="{{ $mobil->kode }}" readonly>
                        <div class="text-danger">
                            @error('kode')
                                {{ $message }}
                            @enderror
                        </div>
                    <div class="form-group">
                        <label for="merek">Merek</label>
                        <input type="text" name="merek" class="form-control" value="{{ $mobil->merek }}">
                        <div class="text-danger">
                            @error('merek')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Warna</label>
                        <input type="text" name="warna" class="form-control" value="{{ $mobil->warna }}">
                        <div class="text-danger">
                            @error('warna')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" class="form-control" value="{{ $mobil->harga}}">
                        <div class="text-danger">
                            @error('harga')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label><br>
                        <img src="{{ url('fotoMobil/'.$mobil->gambar) }}" width="100" alt="">
                        <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}">
                        <div class="text-danger">
                            @error('gambar')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
</form>

@endsection