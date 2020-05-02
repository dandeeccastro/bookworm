<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shelf;

class ShelfController extends Controller
{
    public function index(){
        $shelves = Shelf::all();
        if ($shelves) { return response()->json([$shelves]); } 
        else { return response()->error("No shelves on database",400); }
    }
    public function store(Request $req) {
        $shelf = new Shelf;
        $shelf->library_id = $req->library_id;
        $shelf->rows = $req->rows;
        $shelf->capacity = $req->capacity;
        $shelf->index = $req->index;
        $shelf->save();
        return response()->json([$shelf]);
    }
    public function show($id) {
        $shelf = Shelf::findOrFail($id);
        if ($shelf) { return response()->json([$shelf]);}
        else return response()->error("Shelf doesn't exist",400);
    }
    public function update(Request $req, $id) {
        $shelf = Shelf::findOrFail($id);
        if ($shelf){
            if ($req->library_id) { $shelf->library_id = $req->library_id; }
            if ($req->rows) { $shelf->rows = $req->rows; }
            if ($req->capacity) { $shelf->capacity = $req->capacity; }
            if ($req->index) { $shelf->index = $req->index; }
            $shelf->save();
            return response()->json([$shelf]);
        } else { return response()->json("Shelf doesn't exist",400); }
    }
    public function destroy($id) {
        Shelf::destroy($id);
        return response()->json("Shelf destroyed",400);
    }
}
