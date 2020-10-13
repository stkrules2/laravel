<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'users_addresses';
    protected $fillable = ['fullname', 'company', 'address', 'postcode', 'userid'];
}