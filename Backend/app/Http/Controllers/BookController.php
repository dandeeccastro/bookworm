<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        if ($books) { return response()->json([$books]); } 
        else { return response()->error("No books on database",400); }
    }
    public function store(Request $req) {
        $book = Book::create($req);
        return response()->json([$book]);
    }
    public function show($id) {
        $book = Book::findOrFail($id);
        if ($book) { return response()->json([$book]);}
        else return response()->error("Book doesn't exist",400);
    }
    public function update(Request $req, $id) {
			$book = Book::update($req,$id);
			if($book)
			{
				return response()->json($book);
			}
			else return response()->json("Book doesn't exist",400);
    }
    public function destroy($id) {
        Book::destroy($id);
        return response()->json("Book destroyed",400);
    }
}
