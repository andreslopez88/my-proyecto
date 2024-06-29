<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class resgistroControllers extends Controller
{
    public function store(Request $request){
        $request->validate([
        'name'=>'required|string|max:255',
        'password'=>'required|string|min:8|',
        ]);

        $user = User::create($request->all());

        return response($user, 200);
    }
}

