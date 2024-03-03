<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Alert;
use PDF;

class PenjualanKasirController extends Controller
{
    // Menampilkan semua penjualan
    public function index()
    {
        $penjualans = Penjualan::orderBy('id','asc')->paginate(5);
        return view('kasir.penjualan.index', compact('penjualans'));
    }

    // Menampilkan formulir untuk membuat penjualan baru
    public function create()
    {
        $data = [
            'id_user' => auth()->user()->id,
            'nama_kasir' => auth()->user()->nama_lengkap,
            'total_harga' => 0,
            'bayar' => 0,
            'kembali' => 0,
        ];

        $penjualans = Penjualan::create($data);
        return redirect('/kasir/penjualan/'.$penjualans->id.'/edit');
    }

    public function search(Request $request)
    {
        $keyword = $request -> input('cari');
        $penjualans = Penjualan::where('id', 'like', "%".$keyword."%")->paginate(100);
        return view('kasir.penjualan.index', compact('penjualans'));
    }



    // Menyimpan penjualan baru
    public function store(Request $request)
    {
        //
    }

    // Menampilkan detail penjualan
    public function show()
    {
        $penjualans = Penjualan::all();
        $pdf = PDF::loadView('kasir.penjualan.laporan', compact('penjualans'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    // Menampilkan formulir untuk mengedit penjualan
    public function edit($id)
    {
        $produk = Produk::get();

        $id_produk = request('id_produk');
        $produkdetail = Produk::find($id_produk);

        $id_pelanggan = request('id_pelanggan');
        $memberdetail = Pelanggan::find($id_pelanggan);

        $detailpenjualan = DetailPenjualan::whereIdPenjualan($id)->get();

        $act = request('act');
        $qty = request('qty');
        if ($act == 'min') {
            if ($qty <= 1) {
                $qty = 1;
            }else {
                $qty = $qty - 1;
            }
        }else {
            $qty = $qty + 1;
        }

        $subtotal = 0;
        if ($produkdetail) {
            $subtotal = $qty * $produkdetail->harga;
        }

        $penjualans = Penjualan::find($id);

        $bayar = request('bayar');
        $kembali = $bayar - $penjualans->total_harga;

        $print = request('print');

        $data = [
            'produk' => $produk,
            'produkdetail' => $produkdetail,
            'memberdetail' => $memberdetail,
            'qty' => $qty,
            'subtotal' => $subtotal,
            'detailpenjualan' => $detailpenjualan,
            'penjualan' => $penjualans,
            'kembali' => $kembali,
            'bayar' => $bayar,
            'print' => $print,
        ];

        if ($print == 'klik') {
            $customPaper = array(0,0,567.00,283.80);
            $pdf = PDF::loadview('admin.penjualan.print', $data)->setPaper($customPaper, 'landscape');
            return $pdf->stream();
        } else {
            return view('kasir.penjualan.create', $data);
        }
    }

    // Memperbarui penjualan yang ada
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Penjualan::destroy($id);
        // Alert::success('Selamat', 'Transaksi Berhasil Dihapus');
        return redirect('/kasir/penjualan');
    }
}
