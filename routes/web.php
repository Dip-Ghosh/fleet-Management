<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('login');
Route::get('/invite-partner', function(){
    return view('invitePartner');
});
Route::post('dashboard', 'LoginController@postLogin');
Route::post('logout', 'LoginController@logout')->name('logout');


//Route::group(['middleware' => ['auth-token', 'checkPermission']], function () {
Route::group(['middleware' => ['auth-token']], function () {

    Route::get('dashboard', 'AdminController@index')->name('admin-dashboard');

    //partner
    Route::group(['prefix' => 'partners', 'as' => 'partners.'], function () {
        Route::get('search', 'AdminController@search')->name('search');
        Route::post('edit/status', 'AdminController@editStatus')->name('edit.status');
        Route::get('/', 'AdminController@show')->name('list');
        Route::post('edit', 'AdminController@edit')->name('edit');
        Route::post('update', 'AdminController@update')->name('update');
        Route::post('location-wise-area', 'AdminController@getLocationWiseArea')->name('location_wise_area');
    });

    //locations
    Route::resource('locations', CityController::class);

    //areas
    Route::resource('areas', AreaController::class);
    
    //car type
    Route::resource('car-types', CarTypeController::class);

    //car brand
    Route::resource('car-brands', CarBrandController::class);
    Route::post('car-brands/car-type-wise-brands', 'CarBrandController@carBrandValue')->name('car-brands.car_type_wise_brands');

    //car model
    Route::resource('car-models', CarModelController::class);
    
     //trip type
    Route::resource('trip-types',TripTypeController::class);

    // remark-status
    Route::resource('preset-remarks',PresetRemarkController::class);

    // remark-status
    Route::resource('call-notes',CallNoteController::class);

    Route::get('trip-request', function(){
        return view('tripRequest');
    });
});




