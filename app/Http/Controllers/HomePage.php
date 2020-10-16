<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Banner;
use App\Category;
use App\Dish;
use App\Cart;
use App\Wishlist;

class HomePage extends Controller
{
    public function index()
    {
        $banner = Banner::get();
        $category = Category::get();
        $dish = Dish::get();
        if (Auth::user()) {
            $cart = Cart::where('userid', Auth::user()->id)->get();
            $wish = Wishlist::where('userid', Auth::user()->id)->get();

            $total = 0;
            foreach ($cart as $userid) {

                $temp = $dish->where('id', $userid['dishid'])->pluck('price');
                $total = $total + ($temp[0] * $userid['countdish']);
            }
            return view('home', ['banner' => $banner, 'category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
        }
        return view('home', ['banner' => $banner, 'category' => $category, 'dish' => $dish]);
    }
}
