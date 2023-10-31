<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class barangcontroller extends Controller
{
    public function index()
    {
        // $barangs = DB::table("barang as b")
        //     ->join('kategori as k', 'k.id', '=', 'b.id_kategori')
        //     ->get();

        $barangs = barang::select('barang.*', 'kategori.nama')->join('kategori', 'barang.id_kategori', '=', 'kategori.id')->get();

        // $dataToView = [
            //     'barangs' => $sql_barang
            // ];
            // dd($sql_barang);
            // dd($barangs);
            return view('barang.index', compact('barangs'));
        }

        
    public function tambah()
    {
        $sql_barang = DB::table("barang")
            ->select('id')
            ->orderBy("id", "DESC")
            ->first();
        $sql_kategori = DB::table('kategori')->get();

        if ($sql_barang != null) {
            $kode_barang = "BRG" . $sql_barang->id + 1;
        } else {
            $kode_barang = "BRG1";
        }

        $data = [
            'kode_barang' => $kode_barang,
            'kategori' => $sql_kategori
        ];

        return view('barang.form', $data);
    }

    public function simpan(Request $request)
    {
        // dd($request->all());

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
            'id_kategori' => $request->kategori_barang,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        DB::table("barang")->insert($data);

        // barang::create($data);

        return redirect()->route('barang');
    }

    public function edit($id)
    {
        $barang = barang::where('id', $id)->first();
        $sql_kategori = DB::table("kategori")
            ->get();

        $dataKirim = [
            'barang' => $barang,
            'kategoris' => $sql_kategori,
        ];

        return view('barang.edit', $dataKirim);
    }

    public function update(request $request)
    {
        $id_barang = $request->id_barang;
        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ];

        DB::table("barang")
            ->where("id", $id_barang)
            ->update($data);

        return redirect()->route('barang');
    }

    public function hapus($id)
    {
        barang::find($id)->delete();

        return redirect()->route('barang');
    }
}
