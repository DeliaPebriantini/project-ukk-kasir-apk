<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        $pengguna = User::count();
        $produk = Produk::count();
        $penjualan = Penjualan::count();
        $pelanggan = Pelanggan::count();
        $modal = DB::table('produks')->sum('harga_awal');
        $penghasilan = DB::table('penjualans')->sum('total_harga');
        $laba = $penghasilan - $modal;
        $produkterjual = DB::table('detail_penjualans')->sum('jumlah_produk');

        $data = [
            'users' => $users,
            'pengguna' => $pengguna,
            'produk' => $produk,
            'penjualan' => $penjualan,
            'pelanggan' => $pelanggan,
            'modal' => $modal,
            'penghasilan' => $penghasilan,
            'laba' => $laba,
            'produkterjual' => $produkterjual,
        ];

        return view('kasir.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
