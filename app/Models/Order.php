<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function outlet() 
    {
        return $this->belongsTo(Outlet::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
