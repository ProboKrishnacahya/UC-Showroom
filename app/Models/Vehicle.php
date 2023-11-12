<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $primaryKey = 'vehicle_id';

    protected $fillable = [
        'vehicle_type',
        'model',
        'year',
        'passenger_count',
        'manufacturer',
        'price',
        'fuel_type',
        'trunk_space',
        'wheel_count',
        'cargo_area_size',
        'trunk_size',
        'fuel_capacity',
        'image'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
