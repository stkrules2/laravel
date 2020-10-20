<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['userid', 'cartid', 'addressid','total_price', 'payment_method' ,'status' ];
}