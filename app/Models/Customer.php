<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'id_card',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
