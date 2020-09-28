<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::get();
        $category1 = $category;

        return view('adminMenu', ['category'=>$category, 'category1'=>$category1]);
    }
    public function insert(Request $request){

        $category = new Category();        
        $request->validate([
            'category-name' => 'required | min:3 | max: 30'
        ]);
        $category->title = $request->input('category-name');
        $category->save();
        return redirect('admin/menu');
    }

    public function edit(Request $request){
        $request->validate([
            'category-name' => 'required | min:3 | max: 30'
        ]);
        Category::where('id', $request->input('id'))->update(['title' => $request->input('category-name')]); 
        return redirect('admin/menu');
    }
    
    public function delete($id){
        Category::where('id', $id)->delete();
        return redirect('admin/menu');
    }
}