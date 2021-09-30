<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code',
    ];

    public function shipping_rate()
    {
        return $this->hasOne(ShippingRate::class, 'country_id', 'id');
    }
}
