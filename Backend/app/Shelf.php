<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
	public function create($request)
	{
		$shelf = new Shelf;
		$shelf->library_id = $request->library_id;
		$shelf->rows = $request->rows;
		$shelf->capacity = $request->capacity;
		$shelf->index = $request->index;
		$shelf->save();
		return $shelf;
	}
	public function update($request,$id)
	{
		$shelf = Shelf::findOrFail($id);
		if($shelf)
		{
			if ($request->library_id) { $shelf->library_id = $request->library_id; }
			if ($request->rows) { $shelf->rows = $request->rows; }
			if ($request->capacity) { $shelf->capacity = $request->capacity; }
			if ($request->index) { $shelf->index = $request->index; }
			$shelf->save();
			return $shelf;
		}
		else return null;
	}
    public function library() {
        return $this->belongsTo('App\Shelf');
    }
}
