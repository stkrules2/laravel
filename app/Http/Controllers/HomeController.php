<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\Dish;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::get();
        $category = Category::get();
        $dish = Dish::get();

        return view('home', ['banner' => $banner, 'category' => $category, 'dish' => $dish]);
    }
    public function setting()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('setting', ['category' => $category, 'dish' => $dish]);
    }
    public function __construct()
    {
        $this->middleware(['auth']);
    }
}