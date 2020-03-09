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

Route::get('/user-profile', function () {
    return view('user.profile');
});

Auth::routes(['verify' =>true]);

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Route::get('/test', function () {
//
//    $allPackages = \App\Models\Package::where('status',\App\Enums\PackageStatus::PUBLISHED)->pluck('meta');
//
//
//    $multiplied = $allPackages->map(function ($item, $key) {
//        $a = json_decode($item);
//        $ci = $a->address->city;
//        return $ci;
//    });
//
//    $activeCities = $multiplied->collapse();
//
////    $cityArray = [];
////
////    foreach ($allPackages as $ap) {
////        array_push($cityArray,[])
////    }
//
//
//
//    return $allPackagedCountry = \App\Models\Country::select('cities.*',DB::raw("CONCAT(countries.name,'->',states.name,'->',cities.name) as name"))
//        ->leftJoin('states','states.country_id','countries.id')
//        ->leftJoin('cities','cities.state_id','states.id')
//        ->whereIn('cities.id',$activeCities)
//        ->distinct('countries.id')
////        ->where('cities.name','like',"%$keyword%")
////        ->take($this->searchLimit)
//        ->orderBy('cities.name', 'ASC')
//        ->get();
//
//});

    /*
    * Package related routes starts from here
    * */
    Route::prefix('package')->group(function (){
        Route::get('{package}/details','PackageController@getPackageDetails')->name('package.details');
        Route::get('package-lists/{packageType?}','PackageController@getAllPackageLists')->name('package.lists');
        Route::post('booking','PackageController@saveBooking')->name('package.booking');
    });

    Route::prefix('ajax')->group(function (){
        Route::get('/city/{country?}/{state?}','GlobalSearchController@searchCity')->name('ajax.city');
        Route::get('/city-search','GlobalSearchController@searchFromAllCity')->name('ajax.allCity');
//        Route::get('/BD-city-search','GlobalSearchController@searchFromBdAllCity')->name('ajax.AllBdCity');
        Route::get('/BD-city-search','GlobalSearchController@searchFromAllActivePackagedCity')->name('ajax.getAllActivePackage.city');
        Route::get('/package-themes','GlobalSearchController@searchPackageThemes')->name('ajax.packageTheme');
    });

Route::get('/','HomeController@index')->name('home');

Route::post('search/autocomplete', 'HomeController@autocomplete')->name('search/autocomplete');


Route::post('search/insertflightquery', 'SearchController@insertsearchflights')->name('insertsearchflight');
Route::post('search/insertholidayquery', 'SearchController@insertsearchholiday')->name('insertsearchholiday');
Route::post('search/inserttourquery', 'SearchController@insertsearchtours')->name('insertsearchtours');


Route::get('visaguide', 'VisaGuideController@index')->name('visaguide');
Route::post('visaguide/view', 'VisaGuideController@viewvisaguide')->name('viewvisaguide');


Route::post('contact-us', 'EmailController@contactUs')->name('contactUs');

Route::match(array('GET', 'POST'), 'coming-soon', function () {
    return redirect()->back()->with('warning', 'This feature will be available soon');
})->name('coming-soon');

Route::view('pdf', 'pdf.pdf');

//Route::get('login', 'Auth\AuthController@showLoginForm');


Route::get('/home', 'HomeController@index')->name('home');
