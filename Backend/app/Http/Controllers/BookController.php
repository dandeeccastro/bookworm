<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
	public function all(Request $req) {
		$books = Book::all();
		return response()->json($books);
	}

	public function index(Request $req) {
		$book = Book::findOrFail($id);
		return response()->json($book);
	}

	public function add(Request $req) {
		$book = new Book();

		$book->title = $req->title;
		$book->description = $req->description;
		$book->author_id = $req->author_id;
		$book->publisher_id = $req->publisher_id;

		$book->save();
		return response()->json($book);
	}

	public function edit(Request $req, $id) {
		$book = Book::findOrFail($id);

		if ($req->title)
			$book->title = $req->title;
		if ($req->description)
			$book->description = $req->description;
		if ($req->author_id)
			$book->author_id = $req->author_id;
		if ($req->publisher_id)
			$book->publisher_id = $req->publisher_id;
		
		$book->save();
		return response()->json($book);
	}

	public function remove($id) {
		Book::destroy($id);
		return response()->json("Livro deletado");
	}
}
