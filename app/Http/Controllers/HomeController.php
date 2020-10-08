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
    public function account()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('account', ['category' => $category, 'dish' => $dish]);
    }
    public function password()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('password', ['category' => $category, 'dish' => $dish]);
    }
    public function address()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('address', ['category' => $category, 'dish' => $dish]);
    }
    public function new_address()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('newaddress', ['category' => $category, 'dish' => $dish]);
    }
    public function wishlist()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('wishlist', ['category' => $category, 'dish' => $dish]);
    }
    public function order()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('order', ['category' => $category, 'dish' => $dish]);
    }
    public function mycart()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('cart', ['category' => $category, 'dish' => $dish]);
    }
    public function checkout()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('checkout', ['category' => $category, 'dish' => $dish]);
    }
    public function transaction()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('transaction', ['category' => $category, 'dish' => $dish]);
    }
    public function newsletter()
    {
        $category = Category::get();
        $dish = Dish::get();

        return view('newsletter', ['category' => $category, 'dish' => $dish]);
    }
    public function __construct()
    {
        $this->middleware(['auth']);
    }
}