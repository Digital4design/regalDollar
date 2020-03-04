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
Route::get('/', 'HomeController@getPlanData');

// Route::get('/', function () {
//     return view('public.home');
// });
Route::get('/forget-password', function () {
    return view('pages-recoverpw');
});
Route::get('/admin2', function () {
    return view('admindashboard');
});
Route::group(['prefix' => 'front'], function () {
    Route::get('/create-details', 'Front\AccountController@index');
    Route::post('/create-step1', 'Front\AccountController@postCreateStep1');
    Route::get('/create-step2', 'Front\AccountController@createStep2');
    Route::post('/create-update', 'Front\AccountController@postCreateUpdate');
    Route::post('/update-info', 'Front\AccountController@postInfoUpdate');
});
/****================================ admin routes start ===================================*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::post('/states', 'Admin\DashboardController@states');
    Route::post('/cities', 'Admin\DashboardController@cities');
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', 'Admin\DashboardController@myAccount');
        Route::post('/edit', 'Admin\DashboardController@editAccount');
        Route::post('/edit-password', 'Admin\DashboardController@editAccountPassword');
    });
    /**
     * User Management routes here
     **/
    Route::group(['prefix' => 'users-management'], function () {
        Route::get('/', 'Admin\UserManagementController@index');
        Route::get('/view/{id}', 'Admin\UserManagementController@singleuser');
        Route::get('/user-data', 'Admin\UserManagementController@UserData');
        Route::get('/edit/{id}', 'Admin\UserManagementController@editViewUser');
        Route::post('/update/{id}', 'Admin\UserManagementController@updateUsers');
        Route::get('/delete/{id}', 'Admin\UserManagementController@deleteUser');
    });
    Route::group(['prefix' => 'plan-management'], function () {
        Route::get('/', 'Admin\PlanManagementController@index');
        // Route::get('/singleuser/{id}', 'Admin\PlanManagementController@singleuser');
        Route::get('/add-plan', 'Admin\PlanManagementController@createViewPlan');
        Route::get('/plan-data', 'Admin\PlanManagementController@PlanData');
        Route::get('/edit/{id}', 'Admin\PlanManagementController@editViewPlan');
        Route::post('/saveplan', 'Admin\PlanManagementController@storePlan');
        Route::post('/update/{id}', 'Admin\PlanManagementController@updatePlans');
        Route::get('/delete/{id}', 'Admin\PlanManagementController@deletePlan');
    });
    Route::group(['prefix' => 'fqa-management'], function () {
        Route::get('/', 'Admin\FQAManagementController@index');
        Route::get('/add-FQA', 'Admin\FQAManagementController@createViewFQA');
        Route::get('/fqa-data', 'Admin\FQAManagementController@FQAData');
        Route::get('/edit/{id}', 'Admin\FQAManagementController@editViewFQA');
        Route::post('/savefqa', 'Admin\FQAManagementController@store');
        Route::post('/update/{id}', 'Admin\FQAManagementController@updateFQA');
        Route::get('/delete/{id}', 'Admin\FQAManagementController@destroy');
    });

});
/**** admin routes end */
Route::group(['prefix' => 'client', 'middleware' => ['auth', 'client']], function () {
    Route::get('/', function () {
        return view('dashboard');
    });
});
Route::get('/signup-login', function () {
    return view('pages-login');
});
Route::get('/reg', function () {
    return view('pages-register');
});
Route::get('/select-plan/{id}', 'RegalDollarsController@plan')->where('id', '[0-9]+');

Route::get('/funding-plan', 'RegalDollarsController@funding');

Route::get('/profile', 'RegalDollarsController@profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('{any}', 'VeltrixController@index');
