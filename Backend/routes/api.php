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

Route::get('book','BookController@all');
Route::get('book/{id}','BookController@index');
Route::post('book','BookController@add');
Route::put('book/{id}','BookController@edit');
Route::delete('book/{id}','BookController@remove');

Route::get('author','AuthorController@all');
Route::get('author/{id}','AuthorController@index');
Route::post('author','AuthorController@add');
Route::put('author/{id}','AuthorController@edit');
Route::delete('author/{id}','AuthorController@remove');

Route::get('publisher','PublisherController@all');
Route::get('publisher/{id}','PublisherController@index');
Route::post('publisher','PublisherController@add');
Route::put('publisher/{id}','PublisherController@edit');
Route::delete('publisher/{id}','PublisherController@remove');

Route::get('dewey','DeweyController@all');
Route::get('dewey/{id}','DeweyController@index');
Route::post('dewey','DeweyController@add');
Route::put('dewey/{id}','DeweyController@edit');
Route::delete('dewey/{id}','DeweyController@remove');

Route::get('login','API/PassportController@login');
Route::get('details','API/PassportController@getDetails');
Route::post('register','API/PassportController@register');
Route::get('logout','API/PassportController@logout');