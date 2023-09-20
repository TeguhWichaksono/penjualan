@extends('layouts.app')

@section('title', 'Form Categori')

@section('content')
<form action="{{ route('kategori.tambah.update') }}" method="post">
    @csrf
    <input type="hidden" name="kategori_id" value="{{ $kategori->id }}">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Categori</h6>
            </div>
            <div class="card-body">
                <div class="from-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
</form>
@endsection
