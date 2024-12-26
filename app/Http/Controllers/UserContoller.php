<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserContoller extends Controller
{
    public function show()
    {
        $a_user = User::with('customer')->findOrFail(auth()->id());
        return view('user.show',compact('a_user'));
    }

    public function update(User $user, Request $request)
    {
        $credentials = $request->validate([
            'name' => 'max:40|string',
            'email' => 'email|max:60',
            'password' => 'max:60|min:8'
        ]);
        $user->update($credentials);
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        Auth::logout();
        $user->delete();
        return view('user.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function loginUi()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email|exists:users,email|required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return view('user.login');
        }
        request()->session()->regenerate();
        return redirect()->route('items.index');
    }

    public function registerUi()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:40|string',
            'email' => 'email|required|max:60',
            'password' => 'required|max:60|min:8'
        ]);
        $user = User::create($credentials);
        Auth::login($user);
        return redirect()->route('items.index');
    }
}
