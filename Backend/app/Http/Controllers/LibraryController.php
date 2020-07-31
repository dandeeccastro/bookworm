<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
use App\Shelf;

class LibraryController extends Controller
{
	public function index()
	{
		$libraries = Library::all();
		if ($libraries) { 
			return response()->json($libraries); 
		} 
		else { 
			return response()->error("No authors on database",400); 
		}
	}
	public function show($id) {
		$library = Library::findOrFail($id);
		if($library)
		{ 
			$library->user;
			return response()->json($library); 
		}
		else return response()->error("Library not found",400);
	}
	public function data($id)
	{
		$library = Library::findOrFail($id);
		if ($library)
			return response()->json([
				"books" => $library->books,
			]);

		else return response()->error("Library not found",400);
	}
	public function store(Request $req) {
		$library = Library::create($req);
		return response()->json([$library]);
	}
	public function update(Request $req, $id) {
		$library = Library::change_data($req,$id);
		if ($library) { return $library; }
		else { return response()->json("Library doesn't exist",400); }
	}
	public function destroy($id) {
		Library::destroy($id);
		return response()->json("Library destroyed",400);
	}

	// Expects existing and new as request items
	// existing contains ids for books that are already in the database
	// new contains new books that should be added to the database
	public function addBooks(Request $req,$id) {
		$library = Library::findOrFail($id);
		if($library) { 
			foreach ($req->existing as $book) {
				$library->books()->attach($book["id"]);
			} $library->book_amount = count($library->books); 
			$library->save();
			return response()->json($library->books);
		}
	}

	public function addShelves(Request $req, $id) {
		$library = Library::findOrFail($id);
		if($library) {
			foreach ($req->shelves as $item) {
				$shelf = new Shelf;

				$shelf->rows = $item["rows"];
				$shelf->capacity = $item["capacity"];
				$shelf->index = $item["index"];
				$shelf->library_id = $id;
				$shelf->save();

			} return response()->json($library->shelves);
		}
	}

	
	/**
	 * COMENTADO PORQUE É UMA FUNÇÃO LINDA MAS INUTIL
	 *
	 * Rows capacity = capacity
	 * Shelf capacity = capacity * rows
	 * Total library capacity = shelves * rows * capacity
	private function orderBooksByShelves($books,$shelves)
	{
		// Proper conversion of books object to array
		$resource = array();
		foreach ($books as $book)
		{
			array_push($resource,$book);
		}

		$result = array();

		for ($i = 0;$i < count($shelves); $i++)
		{
			array_push($result,array());

			for($j = 0; $j < $shelves[$i]["rows"];$j++)
			{
				if ($i * $j >= count($resource))
					break;

				array_push($result[$i],array_splice($resource,$i * $j,$i * $j + $shelves[$i]["capacity"]));
			}
		}

		return $result;
	}
	 */
}
