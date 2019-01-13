<?php

Route::group(['middleware' => 'auth'], function () {
    // user profile
    Route::resource('users', 'UserController');


// basic info
    Route::get('config', 'BasicInfoController@index')->name('config.index');
    Route::post('config/save', 'BasicInfoController@store')->name('config.store');
    Route::post('config/update', 'BasicInfoController@update')->name('config.update');
    Route::get('config/policy', 'PolicyController@index')->name('policy.index');
    Route::post('config/policy/save', 'PolicyController@store')->name('policy.store');
    Route::patch('config/policy/update', 'PolicyController@update')->name('policy.update');

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
    Route::resource('gallery', 'ImageGalleryController');

    //Socials
    Route::resource('social', 'SocialController');
    Route::patch('social/{social}/status', 'SocialController@status')->name('route.status');

    //contact

    Route::get('dashboard', 'ContactController@messages')->name('contact.messages');
    Route::DELETE('dashboard/{contact}', 'ContactController@destroy')->name('contact.destroy');
});


Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('root');
//contact
Route::get('contact', 'ContactController@index')->name('contact.index');
Route::post('contact', 'ContactController@send')->name('contact.send');
Route::get('equipments', 'EquimentController@equipments');
Route::get('policy', 'PolicyController@policy')->name('policy.page');


Route::get('/photogallery', function (){
    return view('frontend.gallery');
});
Route::get('/printing', function (){
    return view('frontend.printing');
});
Route::get('/products', function (){
    return view('frontend.products');
});
Route::get('/singlepost', function (){
    return view('frontend.single-post');
});
Route::get('/singleproduct', function (){
    return view('frontend.single-product');
});
