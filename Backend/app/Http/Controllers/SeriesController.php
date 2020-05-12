<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;

class SeriesController extends Controller
{
    public function index(){
        $series = Series::all();
        if ($series) { return response()->json([$series]); } 
        else { return response()->error("No series on database",400); }
    }
    public function store(Request $req) {
			$series = Series::create($req);
			return response()->json($series);
    }
    public function show($id) {
        $series = Series::findOrFail($id);
        if ($series) { return response()->json([$series]);}
        else return response()->error("Series doesn't exist",400);
    }
    public function update(Request $req, $id) {
			$series = Series::update($req,$id);
			if($series) { return response()->json($series); } 
			else { return response()->json("Series doesn't exist",400); }
    }
    public function destroy($id) {
        Series::destroy($id);
        return response()->json("Series destroyed",400);
    }
}
