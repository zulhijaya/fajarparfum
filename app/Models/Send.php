<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    protected $guarded = [];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function send_details()
    {
        return $this->hasMany(SendDetail::class);
    }
}
