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
        $request->validate([
            'fullname' => 'required | regex:/^[a-zA-Z][a-zA-Z\s]*$/ | min:3 | max: 30',
            'address' => 'required | min:5 ',
            'postcode' => 'required | max:7 '
        ]);

        return $request;
    }
    public function __construct()
    {
        $this->middleware(['auth']);
    }
}
