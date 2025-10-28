<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function dish()
    {
        return $this->belongsTo('App\Models\Dish','dish_id');
    }
}
