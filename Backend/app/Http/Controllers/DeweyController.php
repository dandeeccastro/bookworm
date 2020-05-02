<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dewey;

class DeweyController extends Controller
{
    public function store(Request $req, $id) {
        $item = new Dewey;
        
        $item->category = $req->category;
        $item->number = $req->number;
        $item->parent = $req->parent;
        $item->save();

        return response()->json([$item]);
    }
    public function update(Request $req, $id) {
        $item = Dewey::findOrFail($id);
        if ($item){
            if($req->category) { $item->category = $req->category; }
            if($req->number) { $item->number = $req->number; }
            if($req->parent) { $item->parent = $req->parent; }
            $item->save();
            return response()->json([$item]);
        } else {
            return response()->error("Item not found", 400);
        }
    }
    public function destroy($id) {
        Dewey::destroy($id);
        return response()->json(["Category deleted"]);
    }
}
