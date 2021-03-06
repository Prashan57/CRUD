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


//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/', 'BlogController@welcome')->name('welcome');
Route::get('/admin/add', 'BlogController@add')->name('add');
Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard')->middleware("auth");

Route::get('/blogs', 'BlogController@index')->name('index')->middleware('auth');
Route::get('/blogs/create', 'BlogController@create')->name('create');
Route::post('/blogs', 'BlogController@store')->name('store');
Route::get('/blogs/{id}', 'BlogController@show')->name('show')->middleware('auth');
Route::delete('/blogs/{id}', 'BlogController@destroy')->name('destroy')->middleware('auth');

Route::get("/backend/blog/admin", "backend\AdminController@index")->name("admin")->middleware("auth");
Route::post("/backend/blog/admin", "backend\AdminController@store")->name("admin.store")->middleware("auth");
Route::get("/backend/blog/admin/{id}", "backend\AdminController@show")->name("admin.show")->middleware("auth");
Route::delete("/backend/blog/admin/{id}", "backend\AdminController@destroy")->name("admin.destroy")->middleware("auth");
Route::put("/backend/blog/admin/{id}", "backend\AdminController@update")->name("admin.update")->middleware("auth");
Route::get("/backend/blog/admin/edit/{id}", "backend\AdminController@edit")->name("admin.edit")->middleware("auth");

Auth::routes(
    [
        "register" => true,
    ]
);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("/backend/blog", "Backend\BlogController");

Route::resource("/backend/category", "Backend\CategoryController");

Route::resource("/backend/footer", "Backend\FooterController");

Route::resource("/backend/AdminUser", "Backend\AdminUserController");

Route::resource("/backend/Setting", "Backend\SettingController");

