<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Banner;
use App\Category;
use App\Dish;
use App\Cart;
use App\Wishlist;
use App\History;
use App\Promotion;

class HomePage extends Controller
{
    public function index()
    {
        $banner = Banner::get();
        $category = Category::get();
        $dish = Dish::get();
        $history = History::first();
        $special = Dish::where('special_product', 1)->get();
        $promotion = Promotion::first();
        if (Auth::user()) {
            $cart = Cart::where('userid', Auth::user()->id)->where('active', 1)->get();
            $wish = Wishlist::where('userid', Auth::user()->id)->get();

            $total = 0;
            foreach ($cart as $userid) {

                $temp = $dish->where('id', $userid['dishid'])->pluck('price');
                $total = $total + ($temp[0] * $userid['countdish']);
            }
            return view('home', ['banner' => $banner, 'category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish, 'history' => $history, 'special' => $special, 'promotion' => $promotion]);
        }
        return view('home', ['banner' => $banner, 'category' => $category, 'dish' => $dish, 'special' => $special, 'promotion' => $promotion]);
    }
    public function contact()
    {
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
            return view('contact', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
        }
        return view('contact', ['category' => $category, 'dish' => $dish]);
    }
    public function showDishes(Request $request)
    {
        $id = $request->categoryid;
        $dish = Dish::where('category_id', $id)->get();
        return $dish;
    }
    public function getDishes(Request $request)
    {
        $dish = Dish::where('id', $request->input('id'))->first();
        $cat = Category::where('id', $dish->category_id)->first();
        return [$dish, $cat];
    }
}
