@extends('layouts.app')

@section('title', 'Form Barang')

@section('content')
{{-- @dd($barang->id) --}}
<form action="{{ route("barang.tambah.update") }}" method="post">
    @csrf
    <input type="hidden" name="id_barang" value="{{ $barang->id }}">
    <input type="hidden" name="kode_barang" value="{{ $barang->kode_barang }}">
<div>
    <div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ isset($barang) ? 'Form Edit Barang' : 'Form Tambah Barang' }}</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_barang " value="{{ $barang->kode_barang }}"
                     disabled>
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ isset($barang) ? $barang->nama_barang : '' }}">
                </div>
                <div class="form-group">
                    <label for="kategori_barang">Kategori Barang</label>
                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                        @foreach ($kategoris as $kategori )
                            <option value="{{ $kategori->id }}" {{ $barang->id_kategori == $kategori->id ? "selected" : "" }}  >{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Barang</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ isset($barang) ? $barang->harga : '' }}">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Barang</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ isset($barang) ? $barang->jumlah : '' }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
