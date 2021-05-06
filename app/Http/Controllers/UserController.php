<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'department'=> 'required|string',
            'matricule'=> 'required|string',
            'level'=> 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'department' => $fields['department'],
            'matricule' => $fields['matricule'],
            'level' => $fields['level'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201); 
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string|',
            'password' => 'required|string'
        ]);

            //Email Check

        $user = User::where('email', $fields['email'])->first();

            //Password Check
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response ([
                'message' => 'Bad Credentials'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201); 
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out'
        ];
    }
}
