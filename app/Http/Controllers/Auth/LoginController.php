<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request) {
        $credentials = $request->only('login','password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'msg' => 'Login failed'
            ],422);
        }

        $user = Auth::user();
        $token = $user->createToken('Personal Access Token');
        $token->token->expires_at = $request->remember_me ?
            Carbon::now()->addMonth() :
            Carbon::now()->addDay();

        $token->token->save();

        return response()->json([
            'token-type' => 'Bearer',
            'token' => $token->accessToken,
            'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString(),
        ],200);
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();

        return response()->json([
            'msg' => 'Logged out'
        ],200);
    }

    public function user(Request $request) {

        return response()->json($request->user());
    }
}
