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

// Email Verification
Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::group(['middleware' => 'isVerified'], function () {

    Route::get('/profile', 'HomeController@profile')->middleware(['password.confirm'])->name('profile');
    Route::post('/profile/update', 'HomeController@updateProfile')->name('profile.update');
    Route::get('/password', 'HomeController@Password')->middleware(['password.confirm'])->name('password');
    Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');

    // Security Questions
    Route::get('/password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('/password/confirm', 'Auth\ConfirmPasswordController@confirm')->name('password.confirm');

    /*
     * Dashboard
     */
    Route::get('dashboard/', 'DashboardController@index')->name('dashboard');

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

        Route::group(['prefix' => 'user'], function () {
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
            Route::get('allowAutoApprove/{id}', 'Admin\AdminController@toggleAutoApprove')->name('autoApprove');
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

        Route::resource('membership', "Admin\MembershipController");
        Route::resource('complaint', "Admin\ComplaintController");
        Route::resource('payment_method', "Admin\PaymentMethodController");
    });
});