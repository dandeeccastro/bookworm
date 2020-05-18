<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	public function create($request)
	{
		$book = new Book;
		
		$book->title = $request->title;
		$book->year = $request->year;
		$book->edition = $request->edition;
		$book->series_id = $request->series_id;
		$book->publisher_id = $request->publisher_id;
		$book->author_id = $request->author_id;
		$book->series_position = $request->series_position;
		
		$book->save();

		return $book;
	}
	public function change_data($request,$id)
	{
		$book = Book::findOrFail($id);
		if($book)
		{
			if($request->year) { $book->year = $request->year; }
			if($request->title) { $book->title = $request->title; }
			if($request->edition) { $book->edition = $request->edition; }
			if($request->series_id) { $book->series_id = $request->series_id; }
			if($request->author_id) { $book->author_id = $request->author_id; }
			if($request->publisher_id) { $book->publisher_id = $request->publisher_id; }
			if($request->series_position) { $book->series_position = $request->series_position; }

			$book->save();
			return $book;
		}
		else return null;
	}
    public function libraries() {
        return $this->belongsToMany('App\Library');
    }
    public function series() {
        return $this->belongsTo('App\Series');
    }
    public function authors(){
        return $this->belongsToMany('App\Author');
    }
    public function publisher() {
        return $this->belongsTo('App\Publisher');
    }
}
