<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Compliance extends Model
{
    protected $fillable =['compliance_image','description', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
