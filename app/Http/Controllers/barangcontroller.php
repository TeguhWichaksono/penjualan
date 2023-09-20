<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class barangcontroller extends Controller
{
    public function index()
    {
        $sql_barang = DB::table("barang as b")
            ->join('kategori as k', 'k.id', '=', 'b.id_kategori')
            ->get();

        $dataToView = [
            'barangs' => $sql_barang
        ];

        return view('barang.index', $dataToView);
    }

    public function tambah()
    {
        $sql_barang = DB::table("barang")
            ->select('id')
            ->orderBy("id", "DESC")
            ->first();

        if ($sql_barang != null) {
            $kode_barang = "BRG" . $sql_barang->id + 1;
        } else {
            $kode_barang = "BRG1";
        }

        $data = [
            'kode_barang' => $kode_barang,
        ];

        return view('barang.form', $data);
    }

    public function simpan(Request $request)
    {
        $sql_barang = DB::table("barang")
            ->select('id')
            ->orderBy("id", "DESC")
            ->first();

        if ($sql_barang != null) {
            $kode_barang = "BRG" . $sql_barang->id + 1;
        } else {
            $kode_barang = "BRG1";
        }

        $data = [
            'kode_barang' => $kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah
        ];

        barang::create($data);

        return redirect()->route('barang');
    }

    public function edit($id)
    {
        $barang = barang::where('id', $id)->first();
        // dd($barang);

        return view('barang.edit', ['barang' => $barang]);
    }

    public function update($id, request $request)
    {
        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ];
        barang::find($id)->update($data);

        return redirect()->route('barang');
    }

    public function hapus($id)
    {
        barang::find($id)->delete();

        return redirect()->route('barang');
    }
}
