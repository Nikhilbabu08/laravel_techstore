<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|string',
            'email' => 'required|max:100|string',
            'password'=>'required|max:100|string',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(Hash::check($request->password, $user->password)){
            $token = $user->createToken('app-token')->plainTextToken;
            return response()->json([
                'email' => $request->email,
                'password' => $user->password,
                'token' => $token,
                'message' => 'The credential are valid',
                'status' => 200
            ]);
        }
    }
}
