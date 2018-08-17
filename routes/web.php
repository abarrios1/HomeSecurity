<?php
use App\inventory;
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
    return view('/layouts/main');
});
//Route::get('/', 'HomeController@Index');
Route::get('/Home', 'HomeController@Home');
Route::get('/display', 'HomeController@Display')->name('Home.display');
Route::get('/search', function ($id) {
});
    

// CRUD functions
Route::get("/Home/details/{id}", 'HomeController@details')->name('Home.details');
Route::get("/Home/edit/{id}", 'HomeController@details')->name('Home.edit');
Route::get("/Home/delete/{id}", 'HomeController@details')->name('Home.delete');

Route::get('/jQuery', 'jQueryController@index')->name('jQuery.index');