<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class DishController extends Controller
{
    public function index(Request $request)
    {
        $dish = new Dish();
        $fileArray = array();
        $request->validate([
            'new-dish-name' => 'required | min:3 | max: 30',
            'new-dish-price' => 'required',
            'new-dish-description' => 'required',
            'new-dish-category' => 'required',
            'photos' => 'required',
        ]);

        if ($request->hasFile('photos')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'gif'];
            $files = $request->file('photos');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $file->store('images/dish-images', 'public');
                    $fileArray[] = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
        }
        $dish->name = $request->input('new-dish-name');
        if ($request->input('new-dish-availability') == 'Available' || $request->input('new-dish-availability') == 'available') {
            $dish->availibility = 1;
        } else {
            $dish->availibility = 0;
        }
        if ($request->input('new-dish-sale') == 'Sale' || $request->input('new-dish-availability') == 'sale') {
            $dish->sale = 1;
        } else {
            $dish->sale = 0;
        }
        if ($request->input('new-dish-special') == 'Special Product' || $request->input('new-dish-availability') == 'special product') {
            $dish->special_product = 1;
        } else {
            $dish->special_product = 0;
        }
        $dish->price = $request->input('new-dish-price');
        $dish->before_discount_price = $request->input('new-dish-discount');
        $dish->description = $request->input('new-dish-description');
        $dish->category_id = $request->input('new-dish-category');
        $dish->image1 = $fileArray[0];
        if (array_key_exists(1, $fileArray)) {
            $dish->image2 = $fileArray[1];
        }
        if (array_key_exists(2, $fileArray)) {
            $dish->image3 = $fileArray[2];
        }
        $dish->save();
        return redirect('admin/menu');
    }
    public function dishes(Request $request)
    {
        $values = Dish::where('category_id', $request->id)->get();
        return $values;
    }
    public function edit(Request $request)
    {
        $values = Dish::where('id', $request->id)->get();
        return $values;
    }
    public function editform(Request $request)
    {
        $dish = Dish::find($request->input('edit-dish-id'));
        $request->validate([
            'edit-dish-name' => 'required | min:3 | max: 30',
            'edit-dish-price' => 'required',
            'edit-dish-description' => 'required',
        ]);
        if ($request->hasFile('edit-dish-image1')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'gif'];
            $files = $request->file('edit-dish-image1');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/dish-images', 'public');
                $dish->image1 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }

        if ($request->hasFile('edit-dish-image2')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'gif'];
            $files1 = $request->file('edit-dish-image2');
            $filename1 = $files1->getClientOriginalName();
            $extension1 = $files1->getClientOriginalExtension();
            $check1 = in_array($extension1, $allowedfileExtension);
            if ($check1) {
                $filename1 = $files1->store('images/dish-images', 'public');
                $dish->image2 = $filename1;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('edit-dish-image3')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'gif'];
            $files2 = $request->file('edit-dish-image3');
            $filename2 = $files2->getClientOriginalName();
            $extension2 = $files2->getClientOriginalExtension();
            $check2 = in_array($extension2, $allowedfileExtension);
            if ($check2) {
                $filename2 = $files2->store('images/dish-images', 'public');
                $dish->image3 = $filename2;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        $dish->name = $request->input('edit-dish-name');
        if ($request->input('edit-dish-availability') == 'Available' || $request->input('edit-dish-availability') == 'available') {
            $dish->availibility = 1;
        } else {
            $dish->availibility = 0;
        }
        if ($request->input('edit-dish-sale') == 'Sale' || $request->input('edit-dish-availability') == 'sale') {
            $dish->sale = 1;
        } else {
            $dish->sale = 0;
        }
        if ($request->input('edit-dish-special') == 'Special Product' || $request->input('edit-dish-availability') == 'special product') {
            $dish->special_product = 1;
        } else {
            $dish->special_product = 0;
        }
        $dish->price = $request->input('edit-dish-price');
        $dish->before_discount_price = $request->input('edit-dish-discount');
        $dish->description = $request->input('edit-dish-description');
        $dish->save();
        return redirect('admin/menu');
    }
    public function delete($id)
    {
        Dish::where('id', $id)->delete();
        return redirect('admin/menu');
    }
    public function deleteImage($id, $id2)
    {
        $values = Dish::where('id', $id2)->first();
        if ($values) {
            if ($id == 2) {
                $values->image2 = null;
                $values->save();
            } elseif ($id == 3) {
                $values->image3 = null;
                $values->save();
            }
        }
        return 'Success';
    }
}