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
Route::post('/contact', 'HomeController@contactUs');

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
    Route::get('/create-details/{id}', 'Front\AccountController@index');
    Route::post('/create-step1', 'Front\AccountController@postCreateStep1');
    Route::get('/create-step2', 'Front\AccountController@createStep2');
    Route::post('/create-update', 'Front\AccountController@postCreateUpdate');
    Route::post('/update-info', 'Front\AccountController@postInfoUpdate');
    Route::post('/update-amounts', 'Front\AccountController@postAmountUpdate');
    Route::post('/update-docs', 'Front\AccountController@postDocsUpdate');
    Route::post('/update-agreement', 'Front\AccountController@updateAgreements');
    Route::post('/payment-process', 'PaymentController@paymentProcess');

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

    Route::group(['prefix' => 'contact-management'], function () {
        Route::get('/', 'Admin\ContactManagementController@index');
        Route::get('/add-FQA', 'Admin\ContactManagementController@createViewFQA');
        Route::get('/contact-data', 'Admin\ContactManagementController@contactData');
        Route::get('/edit/{id}', 'Admin\ContactManagementController@editViewFQA');
        Route::post('/savefqa', 'Admin\ContactManagementController@store');
        Route::post('/update/{id}', 'Admin\ContactManagementController@updateFQA');
        Route::get('/delete/{id}', 'Admin\ContactManagementController@destroy');
    });
    Route::group(['prefix' => 'documents-management'], function () {
        Route::get('/', 'Admin\DocumentsManagementController@index');
        Route::get('/add-documents', 'Admin\DocumentsManagementController@createDocuments');
        Route::get('/documents-data', 'Admin\DocumentsManagementController@documentsData');
        Route::get('/edit/{id}', 'Admin\DocumentsManagementController@editViewDocs');
        Route::post('/save-docs', 'Admin\DocumentsManagementController@store');
        Route::post('/update/{id}', 'Admin\DocumentsManagementController@updateDocs');
        Route::get('/delete/{id}', 'Admin\DocumentsManagementController@destroy');
    });

});
/**** admin routes end */
Route::group(['prefix' => 'client', 'middleware' => ['auth', 'client']], function () {
    Route::get('/', 'Client\DashboardController@index');
    Route::post('/states', 'Client\DashboardController@states');
    Route::post('/cities', 'Client\DashboardController@cities');
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', 'Client\DashboardController@myAccount');
        Route::post('/edit', 'Client\DashboardController@editAccount');
        Route::post('/edit-password', 'Client\DashboardController@editAccountPassword');
    });

    Route::group(['prefix' => 'documents', 'middleware' => ['auth', 'client']], function () {
        Route::get('/', 'Client\DocumentsManagementController@index');
        Route::get('/documents-data', 'Client\DocumentsManagementController@documentsData');
        Route::get('/view/{id}', 'Client\DocumentsManagementController@singleDocuments');

        // Route::post('/edit', 'Client\DashboardController@editAccount');
        // Route::post('/edit-password', 'Client\DashboardController@editAccountPassword');
    });

    // Route::get('/', function () {
    //     return view('dashboard');
    // });
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
