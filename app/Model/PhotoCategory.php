<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhotoCategory extends Model
{
    protected $fillable = ['category_name'];

    public function sub_categories(){
        return $this->hasMany(PhotoSubCategory::class);
    }
}
