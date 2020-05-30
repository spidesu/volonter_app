<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(RegisterFormRequest $request) {

        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'activation_token' => Str::random(30),
        ]);

        //$user->notify(new RegisterNotification($user));

        return response()->json([
            'msg' => "Register success"
        ],200);
    }

    public function registerActivate($token) {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return response()->json([
                'msg' => 'Token not found',
            ],422);
        }
        $user->activation_token='';
        $user->active = true;
        $user->save();

        return response()->json([
            $user],200);
    }
}
