<?php

Route::get('/manage_subscription', [
    'uses' => 'UserAccountController@manage_subscription',
    'as'   => 'manage_subscription'
]);

Route::get('/download_invoice/{id}', [
    'uses' => 'UserAccountController@download_invoice',
    'as'   => 'download_invoice'
]);

Route::get('/affiliate_program', [
    'uses' => 'UserAccountController@affiliate_program',
    'as'   => 'affiliate_program'
]);

Route::get('/bol_account_detail', [
    'uses' => 'UserAccountController@bol_account_detail',
    'as'   => 'bol_account_detail'
]);

Route::get('/view_invoice', [
    'uses' => 'UserAccountController@view_invoice',
    'as'   => 'view_invoice'
]);

Route::post('/update_profile', [
    'uses' => 'UserAccountController@update_profile',
    'as'   => 'update_profile'
]);

Route::get('/edit_profile', [
    'uses' => 'UserAccountController@edit_profile',
    'as'   => 'edit_profile'
]);

Route::get('/user_account', [
    'uses' => 'UserAccountController@index',
    'as'   => 'user_account'
]);

// Route::get('/first_user_data/{id}','API\ApiController@first_user_data');

Route::get('/to_test_command','API\ApiController@to_test_command');

Route::get('/molli_payment','DashboardController@molli_payment')->name('molli_payment');
Route::post('/recuring_payment','DashboardController@recuring_payment')->name('recuring_payment');

Route::post('/first_payment_status','PaymentController@first_payment_status');

Route::post('/recuring_payment_status','PaymentController@recuring_payment_status');

Route::get('/get_user_shipment_id','GetShipmentIdController@get_user_shipment_id');

Route::resource('/customcategory','CustomCategoryController');

Route::resource('/customcost','CustomCostController');

Route::post('/first_user_data', [
    'uses' => 'API\ApiController@first_user_data',
    'as'   => 'first_user_data'
]);

Route::post('/calculate_tax_report_quarterly', [
    'uses' => 'AjaxController@calculate_tax_report_quarterly',
    'as'   => 'calculate_tax_report_quarterly'
]);

Route::post('/check_client_credentials', [
    'uses' => 'AjaxController@check_client_credentials',
    'as'   => 'check_client_credentials'
]);

Route::post('/retrive_costs_by_month', [
    'uses' => 'AjaxController@retrive_costs_by_month',
    'as'   => 'retrive_costs_by_month'
]);

Route::get('/apicontroller', [
    'uses' => 'API\ApiController@getResponse',
    'as'   => 'apicontroller'
]);

Route::get('/taxreport', [
    'uses' => 'TaxReportController@index',
    'as'   => 'taxreport'
]);

Route::get('/profitloss', [
    'uses' => 'ProfitLossController@index',
    'as'   => 'profitloss'
]);

Route::get('/help', [
    'uses' => 'BackendController@help',
    'as'   => 'help'
]);

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/dash', function () {
    return view('dashboard.dash');
});

Route::get('/dashboard', [
    'uses' => 'DashboardController@index',
    'as'   => 'dashboard'
]);



Route::post('/get-token', [
    'uses' => 'BackendController@getToken',
    'as'   => 'get-token'
]);

Route::get('/stock', [
    'uses' => 'BackendController@stock',
    'as'   => 'stock'
]);

Route::get('/almost-time/{days}', [
    'uses' => 'BackendController@almostTime',
    'as'   => 'almost-time'
]);

Route::get('/lead-times', [
    'uses' => 'BackendController@leadTimes',
    'as'   => 'lead-times'
]);

Route::post('/leadtimes-save', [
    'uses' => 'BackendController@leadTimesSave',
    'as'   => 'leadtimes-save'
]);

Route::get('/refresh-result', [
    'uses' => 'BackendController@refreshResult',
    'as'   => 'refresh-result'
]);


Route::get('/setting', function () {
    return view('dashboard.setting');
});

Route::get('/logout', function(){
    Artisan::call('cache:clear');
    return App::call('\App\Http\Controllers\Auth\LoginController@logout');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('/');
