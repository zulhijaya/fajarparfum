<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function wholesale_prices()
    {
        return $this->belongsToMany(Merk::class, 'wholesale_prices')->withPivot('amount', 'unit', 'price')->orderByPivot('amount');
    }

    public function outlets()
    {
        return $this->belongsToMany(Outlet::class, 'stocks')->withPivot('stock');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function send_details()
    {
        return $this->hasMany(SendDetail::class);
    }

    public function ordered_products()
    {
        return $this->belongsToMany(OrderDetail::class, 'ordered_products')->withPivot('seed', 'qty');
    }

    public function order_details()
    {
        return $this->belongsToMany(OrderDetail::class, 'ordered_products')->withPivot('seed', 'qty');
    }
}
