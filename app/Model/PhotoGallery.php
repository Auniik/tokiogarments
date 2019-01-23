<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    protected $fillable = [
        'image', 'category','sub_category','name','discription',
    ];
}
