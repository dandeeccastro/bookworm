<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
	public function create($request)
	{
		$library = new Library;

		$library->name = $request->name;
		$library->sort_by = $request->sort_by;
		$library->ticked_mode = $request->ticket_mode;
		$library->book_amount = $request->book_amount;

		$library->save();

		return $library;
	}
	public function change_data($request, $id)
	{
		$library = Library::findOrFail($id);
		if($library)
		{
			if ($request->name) { $library->name = $request->name; }
			if ($request->sort_by) { $library->sort_by = $request->sort_by; }
			if ($request->ticket_mode) { $library->ticket_mode = $request->ticket_mode; }
			if ($request->book_amount) { $library->book_amount = $request->book_amount; }
			$library->save();
			return $library;
		}
		else return null;
	}
    public function shelves() {
        return $this->hasMany('App\Shelf');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function books(){
        return $this->belongsToMany('App\Book');
    }
}
