<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth/register');
    }

    public function registerStore(Request $request){
        
        $validasidata = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password'=> 'required|min:5|max:200'
        ]);
        $validasidata['password'] = bcrypt($validasidata['password']);

        User::create($validasidata);
 

        return redirect('/login')->with('success', 'SIGNUP Success!! Login Now..');

    }
}
