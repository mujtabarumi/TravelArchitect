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

    /*
    * Package related routes starts from here
    * */
    Route::prefix('package')->group(function (){
        Route::get('{package}/details','PackageController@getPackageDetails')->name('package.details');
        Route::get('package-lists','PackageController@getAllPackageLists')->name('package.lists');
    });

    Route::prefix('ajax')->group(function (){
        Route::get('/city/{country?}/{state?}','GlobalSearchController@searchCity')->name('ajax.city');
    });

Route::get('/','HomeController@index')->name('home');
Route::post('search/autocomplete', 'HomeController@autocomplete')->name('search/autocomplete');


Route::post('search/insertflightquery', 'SearchController@insertsearchflights')->name('insertsearchflight');
Route::post('search/insertholidayquery', 'SearchController@insertsearchholiday')->name('insertsearchholiday');
Route::post('search/inserttourquery', 'SearchController@insertsearchtours')->name('insertsearchtours');

