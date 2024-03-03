<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;


class DetailPenjualanKasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dp = DetailPenjualan::orderBy('id','asc')->paginate(5);
        return view('kasir.detailpenjualan.index', compact('dp'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id_penjualan = $request->id_penjualan;

        $penjualan = Penjualan::find($id_penjualan);

        $penjualan->id_pelanggan = $request->id_pelanggan;
        $penjualan->nama_pelanggan = $request->nama_pelanggan;
        $penjualan->save();

        return redirect('/kasir/penjualan/'.$id_penjualan.'/edit');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_penjualan = $request->id_penjualan;
        $id_produk = $request->id_produk;

        $dp = DetailPenjualan::whereIdProduk($id_produk)->whereIdPenjualan($id_penjualan)->first();

        $penjualan = Penjualan::find($id_penjualan);

        if ($dp == null) {
            $data = [
                'id_penjualan' =>$request->id_penjualan,
                'id_produk' =>$request->id_produk,
                'nama_produk' =>$request->nama_produk,
                'jumlah_produk' =>$request->jumlah_produk,
                'subtotal' =>$request->subtotal,
            ];
            DetailPenjualan::create($data);

            $dt = [
                'total_harga' => $request->subtotal + $penjualan->total_harga,
            ];
            $penjualan->update($dt);
        }else {
            $data = [
                'jumlah_produk' =>$dp->jumlah_produk + $request->jumlah_produk,
                'subtotal' =>$dp->subtotal + $request->subtotal,
            ];
            $dp->update($data);

            $dt = [
                'total_harga' => $request->subtotal + $penjualan->total_harga,
            ];
            $penjualan->update($dt);
        }
        return redirect('kasir/penjualan/'.$id_penjualan.'/edit');
    }

    public function search(Request $request)
    {
        $keyword = $request -> input('cari');
        $penjualans = Penjualan::where('id', 'like', "%".$keyword."%")->paginate(100);
        return view('kasir.penjualan.index', compact('penjualans'));
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
    public function update(Request $request)
    {
        $id_penjualan = $request->id_penjualan;

        $penjualan = Penjualan::find($id_penjualan);

        $penjualan->bayar = $request->bayar;
        $penjualan->kembali = $request->kembali;
        $penjualan->save();

        return redirect('kasir/penjualan/'.$id_penjualan.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = request('id');
        $td = DetailPenjualan::find($id);

        $penjualan = Penjualan::find($td->id_penjualan);

        $data = [
            'total_harga' => $penjualan->total_harga - $td->subtotal,
        ];
        $penjualan->update($data);

        $td->delete();
        return redirect()->back();
        }    
}
