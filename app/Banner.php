<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $fillable = ['path1', 'path2', 'path3', 'path4', 'path5'];
}