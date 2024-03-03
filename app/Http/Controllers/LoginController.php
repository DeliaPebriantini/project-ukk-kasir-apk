<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                return redirect()->route('admin');
            }
            elseif (Auth::user()->role == 'Kasir') {
                return redirect()->route('kasir');
            }
        }else{
            return view ('login');
        }
    }
    
    public function actionlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::Attempt($data)) {
            $request->session()->regenerate();
       
            if (Auth::user()->role = 'Admin') {
                return redirect()->route('admin');
            } else if (Auth::user()->role = 'Kasir'){
            return redirect()->route('kasir');
            }
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect()->route('login');
        }
    }


    public function actionlogout()
    {
        Auth::logout();
        Session::flash('success', 'Anda Telah Log Out');
        return redirect()->route('login');
    }
}
