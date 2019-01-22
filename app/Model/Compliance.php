<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Compliance extends Model
{
    protected $fillable =['compliance_image', 'pdf_document', 'description', 'slug' , 'homage'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
