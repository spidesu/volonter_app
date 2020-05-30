<?php

namespace App\Http\Controllers\Auth;

use App\Docs\Parameter;
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

    public static function getDocParameterslogin()
    {
        return [
            Parameter::string('email')->header(),
            Parameter::string('password')->header(),
            Parameter::string('Authorization')->header(),
        ];
    }
    public static function getExampleResponseDataLogin()
    {
        return array (
            'id' => 41,
            'type_id' => '',
            'state' => '',
            'q_type' => '',
            'q_value' => '',
            'title' => '',
            'description' => '',
            'creator' => 1,
            'arbiter' => '',
            'publish' => '',
            'deadline' => '',
            'created_at' => '2019-09-15 04:38:50',
            'updated_at' => '2019-09-15 04:38:50',
            'deleted_at' => '',
            'votes' =>
                array (
                    0 =>
                        array (
                            'id' => 11,
                            'votes_id' => 41,
                            'user_id' => 47,
                            'vote_value' => '',
                            'comment' => '',
                            'created_at' => '2019-09-15 07:38:50',
                        ),
                ),
        );
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
