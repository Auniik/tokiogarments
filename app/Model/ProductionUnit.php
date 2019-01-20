<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductionUnit extends Model
{
    protected $fillable = ['name', 'space', 'slug', 'capacity', 'status', 'image_details'];

    public function images()
    {
        return $this->hasMany(ProductionSlider::class)->where('status', 1);
    }

    public function categories()
    {
        return $this->hasMany(ProductionCategory::class)->where('status', 1);
    }

    public function equipments()
    {
        return $this->hasMany(ProductionEquipment::class)->where('status', 1);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
