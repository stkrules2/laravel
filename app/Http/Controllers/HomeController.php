<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Banner;
use App\Category;
use App\Dish;
use App\User;
use App\Address;
use App\Cart;
use App\Wishlist;
use App\Newsletter;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::get();
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();

        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }
        return view('home', ['banner' => $banner, 'category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function setting()
    {
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }
        return view('setting', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function account()
    {
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }
        return view('account', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function password()
    {
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }
        return view('password', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function address()
    {
        $category = Category::get();
        $dish = Dish::get();
        $address = Address::where('userid', Auth::user()->id)->get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }
        return view('address', ['category' => $category, 'dish' => $dish, 'addresses' => $address, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function new_address()
    {
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }

        return view('newaddress', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function deleteAddress($id)
    {
        Address::where('id', $id)->delete();
        return $id;
    }

    public function wishlist()
    {
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }

        return view('wishlist', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function addWishlist($id)
    {
        $wish = new Wishlist();
        $temp = $wish->where('dishid', $id)->where('userid', Auth::user()->id)->get();
        if (isset($temp)) {
            if (count($temp) > 0) {
                return false;
            }
        }


        $wish->userid = Auth::user()->id;
        $wish->dishid = intval($id);
        $wish->save();
        return true;
    }

    public function removeWishlist($id)
    {
        Wishlist::where('id', $id)->delete();
        return redirect('/wishlist');
    }

    public function order()
    {
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }

        return view('order', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function mycart()
    {
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }

        return view('cart', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function checkout()
    {
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }

        return view('checkout', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function transaction()
    {
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }

        return view('transaction', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish]);
    }
    public function newsletter()
    {
        $category = Category::get();
        $dish = Dish::get();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $wish = Wishlist::where('userid', Auth::user()->id)->get();
        $news = Newsletter::where('email', Auth::user()->email)->get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }

        return view('newsletter', ['category' => $category, 'dish' => $dish, 'cart' => $cart, 'total' => $total, 'wish' => $wish, 'news' => $news]);
    }
    public function showDishes(Request $request)
    {
        $id = $request->categoryid;
        $dish = Dish::where('category_id', $id)->get();
        return $dish;
    }
    public function useredit(Request $request)
    {
        if ($request->telephone != null) {
            $request->validate([
                'fullname' => 'required | regex:/^[a-zA-Z][a-zA-Z\s]*$/ | min:3 | max: 30',
                'telephone' => 'regex:/^(?:(?:\+)\d{3})[1-9](?:\d{7})$/u'
            ]);
            User::where('id', Auth::user()->id)->update(['name' => $request->fullname, 'mobile_number' => $request->telephone]);
        } else {
            $request->validate([
                'fullname' => 'required| regex:/^[a-zA-Z][a-zA-Z\s]*$/ | min:3 | max: 30'
            ]);
            User::where('id', Auth::user()->id)->update(['name' => $request->fullname]);
        }
    }
    public function changePassword(Request $request)
    {
        if (Auth::Check()) {
            $requestData = $request->All();
            $validator = $this->validatePasswords($requestData);
            if ($validator->fails()) {
                return Response::json(['error' => $validator->getMessageBag()], 404);
            } else {
                $currentPassword = Auth::User()->password;
                if (Hash::check($requestData['current_password'], $currentPassword)) {
                    $userId = Auth::User()->id;
                    $user = User::find($userId);
                    $user->password = Hash::make($requestData['new_password']);;
                    $user->save();
                    return 'Your password has been updated successfully.';
                } else {
                    return Response::json(['errors' => 'Your current password is incorrect'], 404);
                }
            }
        } else {
            // Auth check failed - redirect to domain root
            return redirect()->to('/password');
        }
    }

    /**
     * Validate password entry
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validatePasswords(array $data)
    {
        $messages = [
            'current_password.required' => 'Please enter your current password',
            'new_password.required' => 'Please enter a new password',
            'confirm_password.not_in' => 'Sorry, common passwords are not allowed. Please try a different new password.'
        ];

        $validator = Validator::make($data, [
            'current_password' => 'required',
            'new_password' => ['required', 'same:new_password', 'min:8', Rule::notIn($this->bannedPasswords())],
            'confirm_password' => 'required|same:new_password',
        ], $messages);

        return $validator;
    }

    /**
     * Get an array of all common passwords which we don't allow
     *
     * @return array
     */
    public function bannedPasswords()
    {
        return [
            'password', '12345678', '123456789', 'baseball', 'football', 'jennifer', 'iloveyou', '11111111', '222222222', '33333333', 'qwerty123'
        ];
    }

    public function addAddress(Request $request)
    {


        $address = new Address();
        $request->validate([
            'fullname' => 'required | regex:/^[a-zA-Z][a-zA-Z\s]*$/ | min:3 | max: 30',
            'address' => 'required | min:5 ',
            'postcode' => 'required | max:7 '
        ]);


        $address->fullname = $request->input('fullname');
        $address->company = $request->input('company-name');
        $address->address = $request->input('address');
        $address->postcode = $request->input('postcode');
        $address->userid = Auth::User()->id;
        $address->save();
    }
    public function addCart($id)
    {
        $cart = new Cart();
        $count = Cart::where('dishid', $id)->where('userid', Auth::User()->id)->first();

        if (isset($count)) {

            $count->countdish = $count->countdish + 1;
            $count->save();
        } else {

            $cart->userid = Auth::User()->id;
            $cart->dishid = $id;
            $cart->countdish = 1;
            $cart->save();
        }
        $cartCount = Cart::where('userid', Auth::user()->id)->get();
        $dish = Dish::get();
        $total = 0;
        foreach ($cartCount as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }
        return [$cartCount, $dish, $total];
    }
    public function removeCart($id)
    {
        Cart::where('id', $id)->delete();
        $cart = Cart::where('userid', Auth::user()->id)->get();
        $dish = Dish::get();
        $total = 0;
        foreach ($cart as $userid) {

            $temp = $dish->where('id', $userid['dishid'])->pluck('price');
            $total = $total + ($temp[0] * $userid['countdish']);
        }
        return [$cart, $dish, $total];
    }
    public function removeCartPage($id)
    {
        Cart::where('id', $id)->delete();
        return redirect('/mycart');
    }
    public function refreshCount($id, $count)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->countdish = $count;
        $cart->save();
        return 'done';
    }

    public function emailNewsletter(Request $request)
    {
        $news = new Newsletter();
        $mailCheck = Newsletter::where('email', $request->input('email'))->get();

        if (count($mailCheck) > 0) {
            return false;
        }
        $news->email = $request->input('email');
        $news->save();
        return true;
    }

    public function changeNewsletterEmail(Request $request)
    {
        $news = new Newsletter();

        if ($request->input('newsletter') == 1) {
            $mailCheck = Newsletter::where('email', Auth::user()->email)->get();

            if (count($mailCheck) > 0) {
                return redirect('/newsletter');
            } else {
                $news->email = Auth::user()->email;
                $news->save();
                return redirect('/newsletter');
            }
        } elseif ($request->input('newsletter') == 0) {
            Newsletter::where('email', Auth::user()->email)->delete();
            return redirect('/newsletter');
        } else {
            return redirect('/newsletter');
        }
    }

    public function __construct()
    {
        $this->middleware(['auth']);
    }
}