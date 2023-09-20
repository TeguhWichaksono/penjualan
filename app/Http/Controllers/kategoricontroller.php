<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kategoricontroller extends Controller
{
    public function index()
    {
        $kategori = kategori::get();

        return view('kategori/index', ['kategori' => $kategori]);
    }

    public function tambah()
    {

        return view('kategori.form');
    }

    public function simpan(Request $request)
    {
        kategori::create(['nama' => $request->nama]);

        return redirect()->route('kategori');
    }

    public function edit($id)
    {
        $sql_kategori = DB::table('kategori')
            ->where("id", $id)
            ->first();

        $dataToView = [
            'kategori' => $sql_kategori
        ];

        return view('kategori.form', $dataToView);
    }

    public function update(Request $request)
    {
        DB::table("kategori")
            ->where("id", $request->kategori_id)
            ->update([
                'nama' => $request->nama_kategori
            ]);

        return redirect()->route('kategori');
    }
}
