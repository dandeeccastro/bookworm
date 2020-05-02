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
        $book = new Book;

        $book->title = $req->title;
        $book->year = $req->year;
        $book->edition = $req->edition;
        $book->series_id = $req->series_id;
        $book->publisher_id = $req->publisher_id;
        $book->author_id = $req->author_id;
        $book->series_position = $req->series_position;
        
        $book->save();
        return response()->json([$book]);
    }
    public function show($id) {
        $book = Book::findOrFail($id);
        if ($book) { return response()->json([$book]);}
        else return response()->error("Book doesn't exist",400);
    }
    public function update(Request $req, $id) {
        $book = Book::findOrFail($id);
        if ($book){
            if ($req->name) { $book->name = $req->name; }
            $book->save();
            
            return response()->json([$book]);
        } else { return response()->json("Book doesn't exist",400); }
    }
    public function destroy($id) {
        Book::destroy($id);
        return response()->json("Book destroyed",400);
    }
}
