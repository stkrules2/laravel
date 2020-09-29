<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';
    protected $fillable = ['name', 'availibility', 'sale', 'special_product', 'price', 'before_discount_price', 'description', 'image1', 'image2', 'image3', 'category_id'];
}