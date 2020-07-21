<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dewey;

class DeweyController extends Controller
{
	public function all(Request $req) {
		$deweys = Dewey::all();
		return response()->json($deweys);
	}

	public function index(Request $req) {
		$dewey = Dewey::findOrFail($id);
		return response()->json($dewey);
	}

	public function add(Request $req) {
		$dewey = new Dewey();

		$dewey->parent = $req->parent;
		$dewey->description = $req->description;
		$dewey->number = $req->number;

		$dewey->save();
		return response()->json($dewey);
	}

	public function edit(Request $req, $id) {
		$dewey = Dewey::findOrFail($id);

		if ($req->parent)
			$dewey->parent = $req->parent;
		if ($req->description)
			$dewey->description = $req->description;
		if ($req->number)
			$dewey->number = $req->number;
		
		$dewey->save();
		return response()->json($dewey);
	}

	public function remove($id) {
		Dewey::destroy($id);
		return response()->json("Categoria deletada");
	}
}
