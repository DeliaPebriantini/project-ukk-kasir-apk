<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
 
class AdminController extends Controller
{
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

        return view('admin.index', $data);
    }
}