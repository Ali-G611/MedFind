<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    public function loginUi(){
        return view('user.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'email|exists:users,email|required',
            'password' => 'exists:users,password'
        ]);
        
        if(auth()->attempt($credentials)){
            return redirect()->route('items.index');
        }
        return view('user.login');
    }

    public function registerUi(){
        return view('user.register');
    }

    public function register(Request $request){
        $credentials = $request->validate([
            'name'=> 'required|max:40|string',
            'email' => 'email|required|max:60',
            'password' => 'required|max:60|min:8'
        ]);
        User::create($credentials);
        return redirect()->route('items.index');
    }
}