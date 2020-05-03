<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

class LibraryController extends Controller
{
    public function index(){
        $libraries = Library::all();
        if ($libraries) { return response()->json($libraries); } 
        else { return response()->error("No authors on database",400); }
    }
    public function store(Request $req) {
        $library = new Library;
        $library->name = $req->name;
        $library->sort_by = $req->sort_by;
        $library->ticket_mode = $req->ticket_mode;
        $library->book_amount = $req->book_amount;
        $library->save();
        return response()->json([$library]);
    }
    public function update(Request $req, $id) {
        $library = Library::findOrFail($id);
        if ($library){
            if ($req->name) { $library->name = $req->name; }
            if ($req->sort_by) { $library->sort_by = $req->sort_by; }
            if ($req->ticket_mode) { $library->ticket_mode = $req->ticket_mode; }
            if ($req->book_amount) { $library->book_amount = $req->book_amount; }
            $library->save();
            return response()->json([$library]);
        } else { return response()->json("Library doesn't exist",400); }
    }
    public function destroy($id) {
        Library::destroy($id);
        return response()->json("Library destroyed",400);
    }
}
