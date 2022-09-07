<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/contacts','App\Http\Controllers\ContactController@index');

Route::get('/add-contact','App\Http\Controllers\ContactController@create');

Route::post('/add-contact','App\Http\Controllers\ContactController@store');

Route::get('/edit-contact/{id}','App\Http\Controllers\ContactController@edit');

Route::put('/update-contact/{id}','App\Http\Controllers\ContactController@update');

// Route::get('/delete-contact/{id}','App\Http\Controllers\ContactController@destroy');
Route::delete('/delete-contact/{id}','App\Http\Controllers\ContactController@destroy');


Route::get('/', function () {
    return view('welcome');
});
