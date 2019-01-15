<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductionSlider extends Model
{
    protected $fillable = ['image', 'status', 'production_unit_id'];

    public function productionUnit()
    {
        return $this->belongsTo(ProductionUnit::class);
    }
}
