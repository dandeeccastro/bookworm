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
        $user = new User;
        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->save();
        return response()->json([$user]);
    }
    public function show($id) {
        $user = User::findOrFail($id);
        if ($user) { return response()->json([$user]);}
        else return response()->error("User doesn't exist",400);
    }
    public function update(Request $req, $id) {
        $user = User::findOrFail($id);
        if ($user){
            if ($req->name) { $user->name = $req->name; }
            if ($req->username) { $user->username = $req->username; }
            if ($req->email) { $user->email = $req->email; }
            if ($req->password) { $user->password = $req->password; }
            $user->save();
            return response()->json([$user]);
        } else { return response()->json("User doesn't exist",400); }
    }
    public function destroy($id) {
        User::destroy($id);
        return response()->json("User destroyed",400);
    }
}
