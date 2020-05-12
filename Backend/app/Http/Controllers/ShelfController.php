<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shelf;

class ShelfController extends Controller
{
    public function store(Request $req) {
			$shelf = Shelf::create($req);
        return response()->json([$shelf]);
    }
    public function update(Request $req, $id) {
        $shelf = Shelf::update($req,$id);
				if ($shelf){ return response()->json($shelf); } 
				else { return response()->json("Shelf doesn't exist",400); }
    }
    public function destroy($id) {
        Shelf::destroy($id);
        return response()->json("Shelf destroyed",400);
    }
}
