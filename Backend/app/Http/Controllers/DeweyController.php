<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dewey;

class DeweyController extends Controller
{
    public function store(Request $req) {
        $item = Dewey::create($req);
        return response()->json($item);
    }
    public function update(Request $req, $id) {
        $item = Dewey::change_data($req,$id);
				if ($item){return response()->json([$item]);} 
				else { return response()->error("Item not found", 400);  }
    }
    public function destroy($id) {
        Dewey::destroy($id);
        return response()->json(["Category deleted"]);
    }
}
