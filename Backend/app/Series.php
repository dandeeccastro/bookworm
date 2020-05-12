<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
	public function create($request)
	{
		$series = new Series;
		$series->name = $request->name;
		$series->save();
		return $series;
	}
	public function update($request,$id)
	{
		$series = Series::findOrFail($id);
		if ($series)
		{
			if ($request->name) { $series->name = $request->name; }
			$series->save();
			return $series;
		}
		else return null;
	}
    public function books() {
        return $this->hasMany('App\Book');
    }
}
