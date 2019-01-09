<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PhotoSubCategory extends Model
{
    public function categories(){
        return $this->belongsTo('App\model\PhotoCategory');
    }
}
