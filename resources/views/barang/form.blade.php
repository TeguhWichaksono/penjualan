@extends('layouts.app')

@section('title', 'Form Barang')

@section('content')
<form action="{{ route('barang.tambah.simpan') }}" method="post">
    @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
            </div>
            <div class="card-body">
                <div class="from-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_barang"
                     disabled>
                </div>

                <div class="from-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" >
                </div>

                <div class="from-group">
                    <label for="kategori_barang">Kategori Barang</label>
                    <input type="text" class="form-control" id="kategori_barang" name="kategori_barang">
                </div>

                <div class="from-group">
                    <label for="harga">Harga Barang</label>
                    <input type="number" class="form-control" id="harga" name="harga">
                </div>

                <div class="from-group">
                    <label for="jumlah">Jumlah Barang</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
</form>
@endsection
