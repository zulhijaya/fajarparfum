<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function ordered_products()
    {
        return $this->belongsToMany(Product::class, 'ordered_products')->withPivot('seed', 'qty');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'ordered_products')->withPivot('seed', 'qty');
    }
}
