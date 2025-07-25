<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
}
