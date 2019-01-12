<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = ['heading', 'meta_description', 'image', 'policy_description'];
}
