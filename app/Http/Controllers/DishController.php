<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class DishController extends Controller
{
    public function index(Request $request){
        $dish = new Dish();
        $fileArray = array();
        $request->validate([
            'new-dish-name' => 'required | min:3 | max: 30',
            'new-dish-price' => 'required',
            'new-dish-description' => 'required',
            'new-dish-category' => 'required',
            'photos' => 'required',
        ]);
        
        if($request->hasFile('photos'))
        {
            $allowedfileExtension=['pdf','jpg','png','gif'];
            $files = $request->file('photos');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check)
                {
                    $filename = $file->store('images/dish-images', 'public');
                    $fileArray[] = $filename;
                }
                else
                {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
                
            }
        }
        $dish->name = $request->input('new-dish-name');        
        if($request->input('new-dish-availability') == 'Available' || $request->input('new-dish-availability') == 'available')
        {
            $dish->availibility = 1;
        }
        else{
            $dish->availibility = 0;
        }
        if($request->input('new-dish-sale') == 'Sale' || $request->input('new-dish-availability') == 'sale')
        {
            $dish->sale = 1;
        }
        else{
            $dish->sale = 0;
        }
        if($request->input('new-dish-special') == 'Special Product' || $request->input('new-dish-availability') == 'special product')
        {
            $dish->special_product = 1;
        }
        else{
            $dish->special_product = 0;
        }
        $dish->price = $request->input('new-dish-price');
        $dish->before_discount_price = $request->input('new-dish-discount');
        $dish->description = $request->input('new-dish-description');
        $dish->category_id = $request->input('new-dish-category');
        $dish->image1 = $fileArray[0];
        if(array_key_exists(1 ,$fileArray)){
            $dish->image2 = $fileArray[1];
        }
        if(array_key_exists(2 ,$fileArray)){
            $dish->image3 = $fileArray[2];
        }
        $dish->save();
        return redirect('admin/menu');
        
    }
}