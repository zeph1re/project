<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );
        $kredensil = $request->only('username', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('admin_dashboard');
            } elseif ($user->level == 'user') {
                return redirect()->intended('user');
            }
            return redirect()->intended('/');
        }
        return redirect('login');
    }

    public function register()
    {
        return view('register');
    }

    public function proses_register(Request $request)
    {
        request()->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'validatepassword' => 'required',
            ]
        );

        User::create($request->all());

        return redirect('login')->with('success', 'User Create successfully');
    }

    public function logout(Request $request)
    {
        request()->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
