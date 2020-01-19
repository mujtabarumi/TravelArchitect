<?php


Route::get('/', function () {
    return redirect('/login');
});
Route::get('/home','HomeController@index')->name('home');
Route::get('/table','FaqController@index')->name('table');
//Route::get('/form','HomeController@form')->name('form');
Auth::routes();
// FAQ //
Route::get('/faq','FaqController@index')->name('faq');
//Route::get('/form','FormController@index')->name('form');
// EVENT //
Route::get('/event','EventController@index')->name('event');
Route::get('/event-create','EventController@create')->name('event.create');
Route::post('/event-create','EventController@create')->name('event.create');
Route::post('/event-list','EventController@all')->name('event.all');

//noticeboard//
Route::get('/noticeboard','NoticeBoardController@index')->name('noticeboard');
Route::post('/noticeboard-insert','NoticeBoardController@insert')->name('noticeboard.insert');
Route::post('/noticeboard-getlist','NoticeBoardController@getNBdata')->name('noticeboard.getdata');
Route::post('/noticeboard-edit','NoticeBoardController@edit')->name('noticeboard.edit');

/* Rumi */
Route::get('/Package/add','PackageController@getPackageCreateFrom')->name('package.add');

Route::prefix('ajax')->group(function (){
    Route::get('/package/type','GlobalSearchController@searchPackageType')->name('ajax.package.type');
    Route::get('/package/theme','GlobalSearchController@searchPackageTheme')->name('ajax.package.theme');
    Route::get('/country','GlobalSearchController@searchCountry')->name('ajax.country');
    Route::get('/country/code','GlobalSearchController@searchCountryCode')->name('ajax.country_with_code');
    Route::get('/state/{country}','GlobalSearchController@searchState')->name('ajax.state');
    Route::get('/city/{country?}/{state?}','GlobalSearchController@searchCity')->name('ajax.city');

});
