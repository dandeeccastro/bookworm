<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	public function create($requestuest)
	{
		$author = new Author;
		$author->name = $request->name;
		$author->save();
		return $author;
	}
	public function update($request,$id)
	{
		$author = Author::findOrFail($id);
		if ($author)
		{
			if ($request->name) { $author->name = $request->name; }
			$author->save();

			return $author;
		}
		else 
		{
			return null;
		}

	}
    public function books(){
        return $this->hasMany('App\Book');
    }
}
