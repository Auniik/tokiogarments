<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PhotoCategory extends Model
{
    public function sub_categories(){
        return $this->hasMany('App\model\PhotoSubCategory');
    }
}
