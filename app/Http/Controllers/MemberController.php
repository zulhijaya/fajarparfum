<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\MemberResource;

class MemberController extends Controller
{
    public function index()
    {  
        return MemberResource::collection(User::where('role', 'user')->get());
    }
}
