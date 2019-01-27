<?php

Route::group(['middleware' => 'auth'], function () {
    // user profile
    Route::resource('users', 'UserController');


// basic info
    Route::get('config', 'SiteConfigurationController@index')->name('config.index');
    Route::post('config/save', 'SiteConfigurationController@store')->name('config.store');
    Route::post('config/update', 'SiteConfigurationController@update')->name('config.update');
    Route::get('config/policy', 'PolicyController@index')->name('policy.index');
    Route::post('config/policy/save', 'PolicyController@store')->name('policy.store');
    Route::patch('config/policy/update', 'PolicyController@update')->name('policy.update');

// slider
    Route::resource('slider', 'SliderController');

// client
    Route::resource('client', 'ClientController');

// page
    Route::resource('menus','MenuController');
    Route::get('submenus/{id}', 'SubmenuController@index');
    Route::resource('submenus', 'SubmenuController');

    Route::resource('pages','PageController');
//    Route::put('delete-pdf/{page}','PageController@delete_pdf')->name('pdf.delete');


//Production Unit
//    Route::resource('production','Production\ProductionUnitController');
    Route::resource('production-categories','Production\ProductionCategoryController');
    Route::resource('production-sliders','Production\ProductionSliderController');
    Route::resource('production-equipments','Production\ProductionEquipmentController');
    Route::resource('production-units','Production\ProductionUnitController');

// Equiment
    Route::resource('equipment','EquimentController');

// Compliance
    Route::resource('compliances','ComplianceController');

// Gallery Name
    Route::resource('gallery-categories','GalleryCategoryController');
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
Route::get('equipments', 'EquimentController@equipments')->name('equipments.all');
Route::get('policy', 'PolicyController@policy')->name('policy.page');

Route::get('production-unit/{slug}', 'Production\ProductionUnitController@productionUnit')->name('production.unit');
Route::get('compliance/{slug}', 'ComplianceController@view')->name('compliance.view');
Route::get('page/{slug}','PageController@single_page')->name('page.view');
//Route::get('/compliance', function (){
//    return view('frontend.compliance ');
//});

Route::get('/photogallery', function (){
    return view('frontend.gallery');
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
Route::get('/', 'MainPageController@index')->name('index');
