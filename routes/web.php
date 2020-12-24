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


Auth::routes();

// Social Logins
Route::get('social/auth/redirect/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('social/auth/{provider}', 'Auth\AuthController@handleProviderCallback');


Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile/update', 'HomeController@updateProfile')->name('profile.update');

/*
 * Dashboard
 */
Route::group(['prefix' => 'dashboard', 'middleware'=>'company'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
});

/*
 * Admin
 */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'Admin\HomeController@index');
//    Route::resource('slider', 'Admin\SliderController');
//    Route::resource('facility', 'Admin\FacilityController');
//    Route::resource('event', 'Admin\EventController');
//    Route::resource('food', 'Admin\FoodController');
//    Route::get('page', 'Admin\PageController@index');
//    Route::get('page/{id}/edit', 'Admin\PageController@edit');
//    Route::put('page/{id}', 'Admin\PageController@update');

    Route::group(['prefix' => 'user'], function (){
        // Customer Routes
        Route::resource('customer', 'Admin\CustomerController');
//        Route::get('customer/{id}/profile', 'Admin\CustomerController@profile');
//        Route::put('customer/{id}/profile', 'Admin\CustomerController@update_profile');
//        Route::get('customer/{id}/setting', 'Admin\CustomerController@setting');
//        Route::put('customer/{id}/setting', 'Admin\CustomerController@update_setting');

        // Company Routes
        Route::resource('company', 'Admin\CompanyController');
//        Route::get('company/{id}/profile', 'Admin\CompanyController@profile');
//        Route::put('company/{id}/profile', 'Admin\CompanyController@update_profile');
//        Route::get('company/{id}/setting', 'Admin\CompanyController@setting');
//        Route::put('company/{id}/setting', 'Admin\CompanyController@update_setting');

        // Admin Routes
        Route::resource('administrator', 'Admin\AdministratorController');
//        Route::get('administrator/{id}/profile', 'Admin\AdministratorController@profile');
//        Route::put('administrator/{id}/profile', 'Admin\AdministratorController@update_profile');
//        Route::get('administrator/{id}/setting', 'Admin\AdministratorController@setting');
//        Route::put('administrator/{id}/setting', 'Admin\AdministratorController@update_setting');
    });

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', 'Admin\CategoryController@index');
        Route::get('/{id}/edit', 'Admin\CategoryController@edit');
        Route::get('create', 'Admin\CategoryController@create');
        Route::post('/{id}/update', 'Admin\CategoryController@update');
        Route::post('/store', 'Admin\CategoryController@store');
        Route::delete('/{id}', 'Admin\CategoryController@destroy');

        Route::resource('incident', "Admin\IncidentController");
    });

    //Routes for RoomBookings
    Route::get('/room_booking', 'Admin\RoomBookingController@index');
    Route::get('/room_booking/{id}/edit', 'Admin\RoomBookingController@edit');
    Route::put('/room_booking/{id}/edit', 'Admin\RoomBookingController@update');

    //Routes for EventBookings
    Route::get('/event_booking', 'Admin\EventBookingController@index');
    Route::get('/event_booking/{id}/edit', 'Admin\EventBookingController@edit');
    Route::put('/event_booking/{id}/edit', 'Admin\EventBookingController@update');


    Route::get('/review', 'Admin\ReviewController@index');
    Route::get('/review/{id}/approve', 'Admin\ReviewController@approve');
    Route::get('/review/{id}/reject', 'Admin\ReviewController@reject');

    Route::resource('room_type', 'Admin\RoomTypeController');
    // Route for room types
    Route::group(['prefix' => 'room_type', 'middleware' => 'auth'], function(){
        // Rutes for Room Type Images
        Route::get('/{id}/image', 'Admin\ImageController@index');
        Route::get('/{id}/image/create', 'Admin\ImageController@create');
        Route::post('/{id}/image', 'Admin\ImageController@store');
        Route::get('/{id}/image/{image_id}/edit', 'Admin\ImageController@edit');
        Route::put('/{id}/image/{image_id}/edit', 'Admin\ImageController@update');
        Route::get('/{id}/image/create_multiple', 'Admin\ImageController@create_multiple');
        Route::post('/{id}/image/create_multiple', 'Admin\ImageController@store_multiple');
        Route::delete('/{id}/image/{image_id}', 'Admin\ImageController@destroy');

        // Routes for Rooms
        Route::get('/{id}/room', 'Admin\RoomController@index');
        Route::get('/{id}/room/create', 'Admin\RoomController@create');
        Route::post('/{id}/room', 'Admin\RoomController@store');
        Route::get('/{id}/room/{room_id}/edit', 'Admin\RoomController@edit');
        Route::put('/{id}/room/{room_id}/edit', 'Admin\RoomController@update');
        Route::delete('/{id}/room/{image_id}', 'Admin\RoomController@destroy');

    });
});