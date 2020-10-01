<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $fillable = ['description', 'path1', 'path2', 'path3', 'path4', 'path5'];
}