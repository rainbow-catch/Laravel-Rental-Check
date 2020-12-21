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
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/', 'HomeController@index')->name('home');

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
    Route::resource('slider', 'Admin\SliderController');
    Route::resource('facility', 'Admin\FacilityController');
    Route::resource('event', 'Admin\EventController');
    Route::resource('food', 'Admin\FoodController');
    Route::get('page', 'Admin\PageController@index');
    Route::get('page/{id}/edit', 'Admin\PageController@edit');
    Route::put('page/{id}', 'Admin\PageController@update');

    // User Routes
    Route::resource('user', 'Admin\UserController');
    Route::get('user/{id}/profile', 'Admin\UserController@profile');
    Route::put('user/{id}/profile', 'Admin\UserController@update_profile');
    Route::get('user/{id}/setting', 'Admin\UserController@setting');
    Route::put('user/{id}/setting', 'Admin\UserController@update_setting');


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