<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;

class PublisherController extends Controller
{
    public function index(){
        $publishers = Publisher::all();
        if ($publishers) { return response()->json([$publishers]); } 
        else { return response()->error("No publishers on database",400); }
    }
    public function store(Request $req) {
        $publisher = new Publisher;
        $publisher->name = $req->name;
        $publisher->save();
        return response()->json([$publisher]);
    }
    public function show($id) {
        $publisher = Publisher::findOrFail($id);
        if ($publisher) { return response()->json([$publisher]);}
        else return response()->error("Publisher doesn't exist",400);
    }
    public function update(Request $req, $id) {
        $publisher = Publisher::findOrFail($id);
        if ($publisher){
            if ($req->name) { $publisher->name = $req->name; }
            $publisher->save();
            return response()->json([$publisher]);
        } else { return response()->json("Publisher doesn't exist",400); }
    }
    public function destroy($id) {
        Publisher::destroy($id);
        return response()->json("Publisher destroyed",400);
    }
}
