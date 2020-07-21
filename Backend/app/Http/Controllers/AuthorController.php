<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
	public function all(Request $req) {
		$authors = Author::all();
		return response()->json($authors);
	}

	public function index(Request $req) {
		$author = Author::findOrFail($id);
		return response()->json($author);
	}

	public function add(Request $req) {
		$author = new Author();

		$author->name = $req->name;
		$author->surname = $req->surname;

		$author->save();
		return response()->json($author);
	}

	public function edit(Request $req, $id) {
		$author = Author::findOrFail($id);

		if ($req->name)
			$author->name = $req->name;
		if ($req->surname)
			$author->surname = $req->surname;
		
		$author->save();
		return response()->json($author);
	}

	public function remove($id) {
		Author::destroy($id);
		return response()->json("Autor deletado");
	}
}
