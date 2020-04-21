<?php


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

Route::get('markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');



Auth::routes();
// Auth::routes(['verify' => true]);

Route::group(['prefix' => 'front'], function () {
    Route::get('/create-details/{id}', 'Front\AccountController@index');
    Route::post('/create-step1', 'Front\AccountController@postCreateStep1');
    Route::get('/create-step2', 'Front\AccountController@createStep2');
    Route::post('/create-step3', 'Front\AccountController@postCreateUpdate');
    Route::post('/create-step4', 'Front\AccountController@postInfoUpdate');
    Route::post('/create-step5', 'Front\AccountController@postAmountUpdate');
    Route::post('/create-step6', 'Front\AccountController@postDocsUpdate');
    Route::post('/create-step7', 'Front\AccountController@updateAgreements');
    Route::get('/payment-update/{id}', 'PaymentController@paymentProcess');
});
/**** ================================Admin Routes Start =================================== */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin','verified']], function () {
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

    Route::group(['prefix' => 'withdraw-request-managment' ], function () {
        Route::get('/', 'Admin\WithdrowManagementController@index');
        Route::get('/withdraw-data', 'Admin\WithdrowManagementController@withdrawData');
        Route::get('/edit/{id}', 'Admin\WithdrowManagementController@edit');
        Route::post('/update/{id}', 'Admin\WithdrowManagementController@update');
    });

    Route::group(['prefix' => 'notifications-managment' ], function () {
        Route::get('/', 'Admin\NotificationsManagementController@index');
        Route::get('/notification-data', 'Admin\NotificationsManagementController@notificationData');
    });

});
/****=================================== Admin Routes End ======================================*/
/**** ================================Client Routes Start =================================== */

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
    });

    Route::group(['prefix' => 'create-account', 'middleware' => ['auth', 'client']], function () {
        Route::get('/', 'Client\UserManagementController@index');
        Route::get('/documents-data', 'Client\UserManagementController@documentsData');
        Route::get('/view/{id}', 'Client\UserManagementController@singleDocuments');
    });

    Route::group(['prefix' => 'withdraw-management', 'middleware' => ['auth', 'client']], function () {
        Route::get('/', 'Client\WithdrawManagamentController@index');
        Route::get('/documents-data', 'Client\WithdrawManagamentController@documentsData');
        Route::get('/view/{id}', 'Client\WithdrawManagamentController@singleDocuments');
        Route::post('/withdrowRequest', 'Client\WithdrawManagamentController@withdrowRequest');
    });

    Route::group(['prefix' => 'withdraw-request-managment', 'middleware' => ['auth', 'client']], function () {
        Route::get('/', 'Client\WithdrawManagamentController@index');
        Route::get('/documents-data', 'Client\WithdrawManagamentController@documentsData');
        Route::get('/view/{id}', 'Client\WithdrawManagamentController@singleDocuments');
        Route::post('/withdrowRequest', 'Client\WithdrawManagamentController@withdrowRequest');
    });


    

    Route::group(['prefix' => 'bank-account-management', 'middleware' => ['auth', 'client']], function () {
        Route::get('/', 'Client\BankAccountManagamentController@index');
        Route::post('/save-data', 'Client\BankAccountManagamentController@store');
        Route::get('/view/{id}', 'Client\BankAccountManagamentController@singleDocuments');
    });

    Route::group(['prefix' => 'contact-us-management', 'middleware' => ['auth', 'client']], function () {
        Route::get('/', 'Client\ContactUsController@index');
        Route::post('/save-data', 'Client\ContactUsController@store');
    });

    Route::group(['prefix' => 'purchase-new-plan', 'middleware' => ['auth', 'client']], function () {
        Route::get('/start-with/{id}', 'Client\AdditionalPlanManagmentController@index');
        Route::post('/save-data', 'Client\AdditionalPlanManagmentController@store');
        Route::post('/update-aggrement-data', 'Client\AdditionalPlanManagmentController@updateAggrement');
        Route::get('/update-payment/{id}', 'Client\AdditionalPlanManagmentController@updatePayment');
        Route::get('/update-plan-payment/{id}', 'Client\AdditionalPlanManagmentController@updatePayment');
    });

    Route::group(['prefix' => 'notifications-managment' ], function () {
        Route::get('/', 'Client\NotificationsManagementController@index');
        Route::get('/notification-data', 'Client\NotificationsManagementController@notificationData');
    });

    Route::group(['prefix' => 'pages-faq' ], function () {
        Route::get('/', 'Client\FQAManagementController@index');
        Route::get('/notification-data', 'Client\NotificationsManagementController@notificationData');
    });

    // Route::get('/', function () {
    //     return view('dashboard');
    // });
});

/****=================================== Client Routes End ======================================*/

Route::get('/signup-login', function () {
    return view('pages-login');
});
Route::get('/reg', function () {
    return view('pages-register');
});
Route::get('/select-plan/{id}', 'RegalDollarsController@plan')->where('id', '[0-9]+');

Route::get('/funding-plan', 'RegalDollarsController@funding');

Route::get('/profile', 'RegalDollarsController@profile');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('{any}', 'VeltrixController@index');
