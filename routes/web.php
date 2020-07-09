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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', 'BlogController@index')->name('index')->middleware('auth');
Route::get('/blogs/create', 'BlogController@create')->name('create');
Route::post('/blogs', 'BlogController@store')->name('store');
Route::get('/blogs/{id}', 'BlogController@show')->name('show')->middleware('auth');
Route::delete('/blogs/{id}', 'BlogController@destroy')->name('destroy')->middleware('auth');

Route::get("/backend/blog/admin", "backend\AdminController@index")->name("admin")->middleware("auth");
Route::post("/backend/blog/admin", "backend\AdminController@store")->name("admin.store")->middleware("auth");
Route::get("/backend/blog/edit", "backend\AdminController@edit")->name("admin.edit")->middleware("auth");

Auth::routes(
    [
        "register" => true,
    ]
);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("/backend/blog", "Backend\BlogController");
