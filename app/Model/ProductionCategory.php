<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductionCategory extends Model
{
    protected $fillable = ['name', 'status', 'production_unit_id'];

    public function productionUnit()
    {
        return $this->belongsTo(ProductionUnit::class);
    }
}
