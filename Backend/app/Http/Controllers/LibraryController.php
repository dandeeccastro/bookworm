<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

class LibraryController extends Controller
{
    public function index(){
        $libraries = Library::all();
        if ($libraries) { return response()->json($libraries); } 
        else { return response()->error("No authors on database",400); }
    }
		public function show($id) {
				$library = Library::findOrFail($id);
				if($library){ 
					$library->content = $library->books();
					$library->user;
					return response()->json($library); 
				}
				else return response()->error("Library not found",400);
		}
    public function store(Request $req) {
        $library = new Library;
        $library->name = $req->name;
        $library->sort_by = $req->sort_by;
        $library->ticket_mode = $req->ticket_mode;
        $library->book_amount = $req->book_amount;
        $library->save();
        return response()->json([$library]);
    }
    public function update(Request $req, $id) {
        $library = Library::findOrFail($id);
        if ($library){
            if ($req->name) { $library->name = $req->name; }
            if ($req->sort_by) { $library->sort_by = $req->sort_by; }
            if ($req->ticket_mode) { $library->ticket_mode = $req->ticket_mode; }
            if ($req->book_amount) { $library->book_amount = $req->book_amount; }
            $library->save();
            return response()->json([$library]);
        } else { return response()->json("Library doesn't exist",400); }
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
				} return response()->json($library->books);
			}
		}

		public function addShelves(Request $req, $id) {
			$library = Library::findOrFail($id);
			if($library) {
				foreach ($req->shelves as $item) {
					$shelf = new App\Shelf;

					$shelf->rows = $item["rows"];
					$shelf->capacity = $item["capacity"];
					$shelf->index = $item["index"];
					$shelf->library_id = $id;
					$shelf->save();

				} return response()->json($library->shelves);
			}
		}
}
