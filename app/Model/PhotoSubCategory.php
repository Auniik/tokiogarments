<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PhotoSubCategory extends Model
{
    protected $fillable = [
        'category_id', 'sub_category_name'
    ];
    public function category(){
        return $this->belongsTo(PhotoCategory::class);
    }
}
