<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $guarded = [];

    public function wholesale_prices()
    {
        return $this->belongsToMany(Product::class, 'wholesale_prices')->withPivot('amount', 'unit', 'price')->orderByPivot('amount');
    }
}
