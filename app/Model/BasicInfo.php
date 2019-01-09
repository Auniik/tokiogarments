<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
    protected $fillable = [ 'title','phone','email','meta_discription',
        'keywords','slogan','address', 'location','facebook_page','logo' ];
}
