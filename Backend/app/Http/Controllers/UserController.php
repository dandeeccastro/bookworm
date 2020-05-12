<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        if ($users) { return response()->json([$users]); } 
        else { return response()->error("No users on database",400); }
    }
    public function store(Request $req) {
			$user = User::create($req);
			return response()->json($user);
    }
    public function show($id) {
        $user = User::findOrFail($id);
        if ($user) { return response()->json([$user]);}
        else return response()->error("User doesn't exist",400);
    }
    public function update(Request $req, $id) {
			$user = User::update($req,$id);
			if($user){ return response()->json($user); } 
			else { return response()->json("User doesn't exist",400); }
    }
    public function destroy($id) {
        User::destroy($id);
        return response()->json("User destroyed",400);
    }
		public function validateUsername($username) {
			$users = User::all();
			$result = false;
			foreach ($users as $user) {
				if ($username == $user->username){
					$result = true;
					break;
				}
			} return response()->json(["result" => $result]);
		}
}
