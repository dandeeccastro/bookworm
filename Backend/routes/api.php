<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register','API\PassportController@register');
Route::post('login','API\PassportController@login');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout','API\PassportController@logout');
    Route::post('getDetails','API\PassportController@getDetails');
});

Route::get("/author","AuthorController@index");
Route::post("/author","AuthorController@store");
Route::get("/author/{id}","AuthorController@show");
Route::put("/author/{id}","AuthorController@update");
Route::delete("/author/{id}","AuthorController@destroy");

Route::get("/book","BookController@index");
Route::post("/book","BookController@store");
Route::get("/book/{id}","BookController@show");
Route::put("/book/{id}","BookController@update");
Route::delete("/book/{id}","BookController@destroy");

Route::post("/dewey","DeweyController@store");
Route::put("/dewey/{id}","DeweyController@update");
Route::delete("/dewey/{id}","DeweyController@destroy");

Route::get("/library","LibraryController@index");
Route::get("/library/{id}","LibraryController@show");
Route::post("/library/{id}/book","LibraryController@addBooks");
Route::post("/library","LibraryController@store");
Route::put("/library/{id}","LibraryController@update");
Route::delete("/library/{id}","LibraryController@destroy");

Route::get("/publisher","PublisherController@index");
Route::post("/publisher","PublisherController@store");
Route::get("/publisher/{id}","PublisherController@show");
Route::put("/publisher/{id}","PublisherController@update");
Route::delete("/publisher/{id}","PublisherController@destroy");

Route::get("/series","SeriesController@index");
Route::post("/series","SeriesController@store");
Route::get("/series/{id}","SeriesController@show");
Route::put("/series/{id}","SeriesController@update");
Route::delete("/series/{id}","SeriesController@destroy");

Route::post("/shelf","ShelfController@store");
Route::put("/shelf/{id}","ShelfController@update");
Route::delete("/shelf/{id}","ShelfController@destroy");

Route::get("/user","UserController@index");
Route::post("/user","UserController@store");
Route::get("/user/{id}","UserController@show");
Route::put("/user/{id}","UserController@update");
Route::delete("/user/{id}","UserController@destroy");
Route::get("/user/validate/{username}","UserController@validateUsername");
