<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dewey extends Model
{
	public function create ($request)
	{
		$dewey = new Dewey;

		$dewey->category = $request->category;
		$dewey->number = $request->number;
		$dewey->parent = $request->parent;

		$dewey->save();
		return $dewey;
	}

	public function update($request,$id)
	{
		$dewey = Dewey::findOrFail($id);
		if($dewey)
		{
			if($request->category) { $dewey->category = $request->category; }
			if($request->number) { $dewey->number = $request->number; }
			if($request->parent) { $dewey->parent = $request->parent; }
			$dewey->save();
			return $dewey;
		}
		else return null;
	}
}
