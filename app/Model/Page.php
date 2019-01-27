<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name', 'title','slug', 'pdf_document', 'description'];

//    public function getRouteKeyName(){
//        return 'slug';
//    }
}
