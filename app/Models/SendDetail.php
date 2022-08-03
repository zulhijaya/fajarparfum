<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendDetail extends Model
{
    protected $guarded = [];

    public function send()
    {
        return $this->belongsTo(Send::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
