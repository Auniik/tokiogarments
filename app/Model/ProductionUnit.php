<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductionUnit extends Model
{
    protected $fillable = ['name', 'space', 'capacity', 'status', 'image_details'];

    public function images()
    {
        return $this->hasMany(ProductionSlider::class);
    }

    public function categories()
    {
        return $this->hasMany(ProductionCategory::class);
    }

    public function equipments()
    {
        return $this->hasMany(ProductionEquipment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
