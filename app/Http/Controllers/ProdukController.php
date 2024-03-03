<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Session;
use PDF;

class ProdukController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d');

        $produk = Produk::orderBy('id','asc')->paginate(5);
        return view ('admin.produk.index', compact('produk'));
    }


    public function create()
    {
        return view('admin.produk.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_awal' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga_awal' => $request->harga_awal,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        
        return redirect()->route('produk');
    }



    public function search(Request $request)
    {
        $keyword = $request -> input('cari');
        $produk = Produk::where('nama_produk', 'like', "%".$keyword."%")->paginate(100);
        return view('admin.produk.index', compact('produk'));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $produk = Produk::all();
        $pdf = PDF::loadView('admin.produk.laporan', compact('produk'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }


    public function edit(string $id)
    {
        $produk = Produk::find($id);
        return view('admin.produk.edit',compact('produk'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_awal' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
        
        $produk = Produk::find($id);
        
            $produk->nama_produk = $request->nama_produk;
            $produk->harga_awal = $request->harga_awal;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;
            $produk->update();

        Session::flash('Selamat', 'Produk Berhasil Diedit');
        return redirect()->route('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy( string $id)
    {
        Produk::destroy($id);
        Session::flash('Selamat', 'Produk Berhasil Dihapus');
        return redirect()->route('produk');
    }

}