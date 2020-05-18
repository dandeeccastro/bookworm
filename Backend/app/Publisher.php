<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
	public function create($request)
	{
		$publisher = new Publisher;
		$publisher->name = $request->name;
		$publisher->save();
		return $publisher;
	}
	public function change_data($request,$id)
	{
		$publisher = Publisher::findOrFail($id);
		if($publisher)
		{
				if ($request->name) { $publisher->name = $request->name; }
				$publisher->save();
				return $publisher;
		}
		else return null;
	}
    public function books(){
        return $this->hasMany('App\Book');
    }
}
