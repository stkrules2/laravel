<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::get();

        return view('home', ['banner'=>$banner]);
    }
}