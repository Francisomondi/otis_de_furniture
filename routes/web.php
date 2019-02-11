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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', 'pagesController@index');
Route::get('/about', 'pagesController@about');
Route::get('/tesmonials', 'pagesController@testimonials');
Route::get('/homegallery', 'pagesController@homegallery');
Route::get('/bootstrap1', 'pagesController@bootstrap1');
Route::get('/bootstrap2', 'pagesController@bootstrap2');
Route::get('/bootstrap3', 'pagesController@bootstrap3');
Route::get('/bootstrap4', 'pagesController@bootstrap4');
Route::get('/bootstrap5', 'pagesController@bootstrap5');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('barstools','barStoolsController');
Route::resource('bedrooms','bedroomsController');
Route::resource('carbinets','carbinetsController');
Route::resource('conferenceTables','conferenceTablesController');
Route::resource('dinnings','dinningsController');
Route::resource('fabricsofas','fabricsofasController');
Route::resource('leathersofas','leathersofasController');
Route::resource('furnituregallery','furnituregalleryController');
Route::resource('inquiry','inquiryController');

