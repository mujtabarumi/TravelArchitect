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

//Route::get('/', function () {
//    return view('layout.view');
//})->name('home');

Route::get('/','HomeController@index')->name('home');
Route::post('search/autocomplete', 'HomeController@autocomplete');

Route::post('search/insertflightquery', 'SearchController@insertsearchflights')->name('insertsearchflight');
Route::post('search/insertholidayquery', 'SearchController@insertsearchholiday')->name('insertsearchholiday');
Route::post('search/inserttourquery', 'SearchController@insertsearchtours')->name('insertsearchtours');