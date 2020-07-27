<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

use DB;
use Auth;

class PassportController extends Controller
{
	public function login(Request $request) {
		if (Auth::attempt(['username' => request('username'), 'password' => request('password')])){
			$user = Auth::user();
			$token = $user->createToken('MyApp')->accessToken;
			return response()->json([
				'user' => $user,
				'token' => $token
			], 200);
		}
		return response()->json(["message"=>"Erro no login, desculpa!"],500);
	}

	public function getDetails() { 
		$user = Auth::user();
		return response()->json(['user' => $user],200);
	}

	public function register(Request $request) {
		$user = new User();
		$user->username = $request->username;
		$user->password = $request->password;
		$user->save();

		$token = $user->createToken('MyApp')->accessToken;

		return response()->json(['user'=>$user]);
	}

	public function logout() {
		$accessToken = Auth::user()->token();
		DB::table('oauth-refresh-tokens')->where('access_token_id',$accessToken->id)->update(['revoked' => true]);
		$accessToken->revoke();
		return response()->json('Logout realizado', 200);
	}
}
