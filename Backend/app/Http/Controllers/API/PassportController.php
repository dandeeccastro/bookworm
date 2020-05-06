<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

class PassportController extends Controller
{
    public $successStatus = 200;

    public function register(Request $req) {
        $validator = Validator::make($req->all(),[
            "name" => "required",
            "username" => "required",
            "email" => "required",
            "password" => "required",
            "c_password" => "required|same:password",
        ]);

        if ( $validator->fails() ) { return response()->json(['error' => $validator->errors()], 401); }

        $user = new User;
        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();

        $success["token"] = $user->createToken("MyApp")->accessToken;
        $success["name"] = $user->name;

        return response()->json(["success" => $success],$this->successStatus);
    }

    public function login(){
        if (Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $user = Auth::user();
            $success["token"] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success],$this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorized'],401);
        }
    }

    public function getDetails() {
        $user = Auth::user();
        return response()->json(["success" => $user],$this->successStatus);
    }

    public function logout(){
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id',$accessToken->id)->update(['revoked'=>true]);
        $accessToken->revoke();
        return response()->json(null,204);
    }
}
