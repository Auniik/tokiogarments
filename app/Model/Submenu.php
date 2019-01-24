<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = ['name', 'slug', 'serial', 'status'];
}
