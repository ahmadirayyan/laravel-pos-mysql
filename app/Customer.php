<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $guarded = [];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
