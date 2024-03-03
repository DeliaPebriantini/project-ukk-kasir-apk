<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class PelangganKasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::orderBy('id','asc')->paginate(5);
        return view ('kasir.pelanggan.index', compact('pelanggan'));
    }


    public function create()
    {
        return view('kasir.pelanggan.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);

        $pelanggan = Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);
        
        return redirect()->route('pelanggankasir');
    }

    public function search(Request $request)
    {
        $keyword = $request -> input('cari');
        $pelanggan = Pelanggan::where('nama_pelanggan', 'like', "%".$keyword."%")->paginate(100);
        return view('kasir.pelanggan.index', compact('pelanggan'));
    }


        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pelanggan = Pelanggan::all();
        $pdf = PDF::loadView('kasir.pelanggan.laporan', compact('pelanggan'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }


    public function edit(string $id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('kasir.pelanggan.edit',compact('pelanggan'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);
        
        $pelanggan = Pelanggan::find($id);
        
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
            $pelanggan->alamat = $request->alamat;
            $pelanggan->nomor_telepon = $request->nomor_telepon;
            $pelanggan->save();

        return redirect()->route('pelanggankasir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy( string $id)
    {
        Pelanggan::destroy($id);
        // Alert::success('Selamat', 'pelanggan Berhasil Dihapus');
        return redirect()->route('pelanggankasir');
    }

}