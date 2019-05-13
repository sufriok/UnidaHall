<?php

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

Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('/schedule', 'FrontendController@schedule')->name('frontend.schedule');
Route::get('/schedule/{id}', 'FrontendController@show')->name('frontend.show');
Route::get('/hall', 'FrontendController@hall')->name('frontend.hall');
Route::get('/contact', 'FrontendController@contact')->name('frontend.contact');
Route::post('/submit', 'FrontendController@submit')->name('submit');
Route::post('/send', 'FrontendController@send')->name('send');


Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/{id}', 'HomeController@show')->name('home.show');
    Route::resource('/room', 'RoomController');
    Route::resource('/user', 'UserController');
    Route::post('/staff/store', 'UserController@staffStore')->name('staff.store');
    Route::resource('/rental', 'RentalController');
    Route::get('/checklist/{rental}', 'RentalController@checklist')->name('checklist');
    Route::get('/export', 'RentalController@export')->name('rental.export');
    Route::resource('/message', 'MessageController');
});
