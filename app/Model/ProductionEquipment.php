<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductionEquipment extends Model
{
    protected $fillable = ['item', 'quantity', 'status', 'production_unit_id'];

    public function productionUnit()
    {
        return $this->belongsTo(ProductionUnit::class);
    }
}
