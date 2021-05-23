<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function user()
    {
        $data_user = \App\User::all();
        return view('admin.user', ['data_user' => $data_user]);
    }

    public function sports()
    {
        return view('admin.sports');
    }

    public function add()
    {
    }

    public function delete()
    {
    }

    public function edit()
    {
    }
}
