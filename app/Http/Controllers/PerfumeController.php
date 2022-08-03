<?php

namespace App\Http\Controllers;

use App\Http\Resources\PerfumeResource;
use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index()
    {  
        return PerfumeResource::collection(Perfume::with('category')->get())->groupBy('category_id');
    }
}
