<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();
        if ($authors) { return response()->json([$authors]); } 
        else { return response()->error("No authors on database",400); }
    }
    public function store(Request $req) {
        $author = new Author;
        $author->name = $req->name;
        $author->save();
        return response()->json([$author]);
    }
    public function show($id) {
        $author = Author::findOrFail($id);
        if ($author) { return response()->json([$author]);}
        else return response()->error("Author doesn't exist",400);
    }
    public function update(Request $req, $id) {
        $author = Author::findOrFail($id);
        if ($author){
            if ($req->name) { $author->name = $req->name; }
            $author->save();
            return response()->json([$author]);
        } else { return response()->json("Author doesn't exist",400); }
    }
    public function destroy($id) {
        Author::destroy($id);
        return response()->json("Author destroyed",400);
    }

}
