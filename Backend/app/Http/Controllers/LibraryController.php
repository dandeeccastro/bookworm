<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
use App\Shelf;

class LibraryController extends Controller
{
    public function index(){
        $libraries = Library::all();
        if ($libraries) { return response()->json($libraries); } 
        else { return response()->error("No authors on database",400); }
    }
		public function show($id) {
				$library = Library::findOrFail($id);
				if($library)
				{ 
					$library->books = $this->orderBooksByShelves($library->books,$library->shelves);
					$library->shelves;
					$library->user;

					return response()->json($library); 
				}
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
		 * Rows capacity = capacity
		 * Shelf capacity = capacity * rows
		 * Total library capacity = shelves * rows * capacity
		 */
		private function orderBooksByShelves($books,$shelves)
		{
			$book_count = count($books);
			$rows = $book_count % $shelves
		}
}
