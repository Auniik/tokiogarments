<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiteConfiguration extends Model
{
    protected $fillable = [ 'title','phone', 'additional_phones', 'email','meta_description',
        'keywords','slogan','address', 'location','facebook_page','logo' ];
}
