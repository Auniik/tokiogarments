<?php

Route::group(['middleware' => 'auth'], function () {
    // user profile
    Route::resource('users', 'UserController');


// basic info
    Route::resource('basic', 'BasicInfoController');

// slider
    Route::resource('slider', 'SliderController');

// client
    Route::resource('client', 'ClientController');

// page
    Route::resource('page','PageController');
    Route::get('page/{title}','PageController@single_page');

// Equiment
    Route::resource('equipment','EquimentController');

// Compliance
    Route::resource('compliance','ComplianceController');

// Gallery Name
    Route::resource('gallery_name','GalleryCategoryController');
    Route::get('sub_category_name/{id}','GallerySubCategoryController@index');
    Route::resource('sub_category_name','GallerySubCategoryController');
    Route::resource('gallery','ImageGalleryController');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');