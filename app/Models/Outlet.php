<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'stocks')->withPivot('stock');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function sends()
    {
        return $this->hasMany(Outlet::class);
    }
}
