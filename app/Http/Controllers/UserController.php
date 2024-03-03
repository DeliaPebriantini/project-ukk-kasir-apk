<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use PDF;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $users = User::orderBy('id','asc')->paginate(5);
        return view ('admin.user.user', compact('users'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('admin.user.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
        ]);

        $users = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,

        ]);
        
        return redirect()->route('user');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = User::all();
        $pdf = PDF::loadView('admin.user.laporan', compact('users'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }


    public function search(Request $request)
    {
        $keyword = $request -> input('cari');
        $users = User::where('nama_lengkap', 'like', "%".$keyword."%")->paginate(100);
        return view('admin.user.user', compact('users'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        return view('admin.user.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'email' => 'required',

        ]);

        $users = User::find($id);

            $users->nama_lengkap = $request->nama_lengkap;
            $users->username = $request->username;
            $users->password = $request->password;
            $users->jenis_kelamin = $request->jenis_kelamin;
            $users->role = $request->role;
            $users->usia = $request->usia;
            $users->email = $request->email;
            $users->save();

        return redirect()->route('user');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        User::destroy($id);
        return redirect()->route('user');
    }

}