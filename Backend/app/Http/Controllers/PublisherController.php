<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;

class PublisherController extends Controller
{
	public function all(Request $req) {
		$publishers = Publisher::all();
		return response()->json($publishers);
	}

	public function index(Request $req) {
		$publisher = Publisher::findOrFail($id);
		return response()->json($publisher);
	}

	public function add(Request $req) {
		$publisher = new Publisher();

		$publisher->name = $req->name;
		$publisher->information = $req->information;

		$publisher->save();
		return response()->json($publisher);
	}

	public function edit(Request $req, $id) {
		$publisher = Publisher::findOrFail($id);

		if ($req->name)
			$publisher->name = $req->name;
		if ($req->information)
			$publisher->information = $req->information;
		
		$publisher->save();
		return response()->json($publisher);
	}

	public function remove($id) {
		Publisher::destroy($id);
		return response()->json("Editora deletada");
	}
}
