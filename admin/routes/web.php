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
Route::prefix('package')->group(function (){

    Route::get('add','PackageController@getPackageCreateFrom')->name('package.add');
    Route::post('add','PackageController@packageCreate')->name('package.add');
    Route::get('{package}/edit','PackageController@getPackageEditFrom')->name('package.edit');
    Route::post('{package}/edit','PackageController@updatePackagePost')->name('package.edit');
    Route::get('{param?}','PackageController@packageListing')->name('package.listing')->defaults('param', 'published');
    Route::get('{package}/duplicate','PackageController@duplicatePackage')->name('package.duplicate');
    Route::get('{package}/delete','PackageController@deletePackage')->name('package.delete');

});

Route::prefix('ajax')->group(function (){
    Route::get('/package/type','GlobalSearchController@searchPackageType')->name('ajax.package.type');
    Route::get('/package/theme','GlobalSearchController@searchPackageTheme')->name('ajax.package.theme');
    Route::get('/country','GlobalSearchController@searchCountry')->name('ajax.country');
    Route::get('/country/code','GlobalSearchController@searchCountryCode')->name('ajax.country_with_code');
    Route::get('/state/{country}','GlobalSearchController@searchState')->name('ajax.state');
    Route::get('/city/{country?}/{state?}','GlobalSearchController@searchCity')->name('ajax.city');
    Route::get('/city-search','GlobalSearchController@searchFromAllCity')->name('ajax.allCity');
    Route::post('/save/meta-data','GlobalSearchController@saveMetaData')->name('save.meta.data');
    Route::post('/save/settings/image','PackageController@savePackageImage')->name('save.settings.image');

});


Route::get('/Search/flight','GlobalSearchController@searchflight')->name('search.flight');
Route::post('/Search/flight','GlobalSearchController@searchflightgetdata')->name('search.flight.getdata');
Route::post('/Search/flight/view','GlobalSearchController@searchflightview')->name('search.flight.view');

Route::get('/Search/holiday','GlobalSearchController@searchholiday')->name('search.holiday');
Route::post('/Search/holiday','GlobalSearchController@searchholidaygetdata')->name('search.holiday.getdata');
Route::post('/Search/holiday/view','GlobalSearchController@searchholidayview')->name('search.holiday.view');

Route::get('/Search/tour','GlobalSearchController@searchtour')->name('search.tour');
Route::post('/Search/tour','GlobalSearchController@searchtourgetdata')->name('search.tour.getdata');
Route::post('/Search/tour/view','GlobalSearchController@searchtourview')->name('search.tour.view');

Route::get('/visaguide','VisaGuideController@visaguide')->name('visaguide');
Route::post('/visaguide/getdata','VisaGuideController@visaguidegetdata')->name('visaguide.getdata');
Route::post('/visaguide/view','VisaGuideController@visaguideview')->name('visaguide.view');
Route::get('/visaguide/add','VisaGuideController@visaguideadd')->name('visaguide.add');
Route::post('/visaguide/insert','VisaGuideController@visaguideinsert')->name('visaguide.insert');
Route::post('/visaguide/edit','VisaGuideController@visaguideedit')->name('visaguide.edit');
