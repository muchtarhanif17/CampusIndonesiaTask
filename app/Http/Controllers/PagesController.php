<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
    public function user()
    {
        return view('admin.user.index');
    }
    public function campus()
    {
        return view('admin.campus.index');
    }
    public function artikel()
    {
        return view('admin.artikel.index');
    }
    public function major()
    {
        return view('admin.campus.major.index');
    }
    public function home()
    {
        return view('auth.auth.login');
    }
}
