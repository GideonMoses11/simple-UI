<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){

        request()->validate([
            'address_english' => 'required|string',
            'address_arabic' => 'required|string',
            'about_english' => 'required|string',
            'about_arabic' => 'required|string',
        ]);

        $user = User::create([
            'address_english' => request()->address_english,
            'address_arabic' => request()->address_arabic,
            'about_english' => request()->about_english,
            'about_arabic' => request()->about_arabic,
        ]);

        if(!$user){
            return response()->json([
                'message' => 'User creation failed!'
            ], 422);
        }

        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user
        ], 201);
    }
}
