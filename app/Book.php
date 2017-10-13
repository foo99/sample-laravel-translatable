<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Book extends Model
{
    use Translatable;

    public $translatedAttributes = [
        'title'
    ];

    protected $fillable = [];
}
