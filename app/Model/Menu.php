<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'slug', 'serial'];

    public function submenus(){
        return $this->hasMany(Submenu::class)->where('status',1);
    }
}
