<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
    public function menu()
    {
        return view('adminMenu');
    }
    public function banner()
    {
        return view('adminBanner');
    }
    public function history()
    {
        return view('adminHistory');
    }
    public function promotion()
    {
        return view('adminPromotion');
    }
    public function users()
    {
        return view('adminUsers');
    }
    public function profile()
    {
        return view('adminProfile');
    }
}