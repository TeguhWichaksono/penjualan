<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function barang()
        {
            $total_barang = barang::count();
            $total_kategori = kategori::count();
            $total_user = User::count();
            return view('dashboard', compact(['total_barang', 'total_kategori', 'total_user']));
        }
}
