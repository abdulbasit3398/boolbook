<?php

// Auth::routes(['verify' => true]);
Route::get('/help',[
    'uses' => 'DashboardController@help',
    'as' => 'help'
]);

Route::get('/check_user_access',[
    'uses' => 'PaymentController@check_user_access',
    'as' => 'check_user_access'
]);

Route::post('/registreren-email',[
    'uses' => 'Auth\RegisterController@subscribed_user',
    'as' => 'SubscribedUser'
]);

Route::get('/registreren-email',[
    'uses' => 'Auth\RegisterController@subscribed_user',
    'as' => 'SubscribedUser'
]);

Route::post('/user_feedback', [
    'uses' => 'FeedbackController@user_feedback',
    'as'   => 'user_feedback'
]);

Route::post('/delete_all_cost_in_month', [
    'uses' => 'DashboardController@delete_all_cost_in_month',
    'as'   => 'delete_all_cost_in_month'
]);

Route::get('/abonnement', [
    'uses' => 'UserAccountController@manage_subscription',
    'as'   => 'manage_subscription'
]);

Route::get('/download_invoice/{id}', [
    'uses' => 'UserAccountController@download_invoice',
    'as'   => 'download_invoice'
]);

Route::get('/affiliate', [
    'uses' => 'UserAccountController@affiliate_program',
    'as'   => 'affiliate_program'
]);

Route::get('/bol-account', [
    'uses' => 'UserAccountController@bol_account_detail',
    'as'   => 'bol_account_detail'
]);

Route::get('/facturen', [
    'uses' => 'UserAccountController@view_invoice',
    'as'   => 'view_invoice'
]);

Route::post('/update_profile', [
    'uses' => 'UserAccountController@update_profile',
    'as'   => 'update_profile'
]);

Route::get('/profiel', [
    'uses' => 'UserAccountController@edit_profile',
    'as'   => 'edit_profile'
]);

Route::get('/account', [
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

Route::resource('/kosten','CustomCostController');

Route::get('/email_first_of_quarter', [
    'uses' => 'API\ApiController@email_first_of_quarter',
    'as'   => 'email_first_of_quarter'
]);

Route::get('/email_last_of_quarter', [
    'uses' => 'API\ApiController@email_last_of_quarter',
    'as'   => 'email_last_of_quarter'
]);

Route::post('/first_user_data', [
    'uses' => 'API\ApiController@first_user_data',
    'as'   => 'first_user_data'
]);

Route::post('/fetch_data_again', [
    'uses' => 'API\ApiController@fetch_data_again',
    'as'   => 'fetch_data_again'
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

Route::get('/btw-aangifte', [
    'uses' => 'TaxReportController@index',
    'as'   => 'taxreport'
]);

Route::get('/resultaat', [
    'uses' => 'ProfitLossController@index',
    'as'   => 'profitloss'
]);

Route::get('/dashboard', [
    'uses' => 'DashboardController@index',
    'as'   => 'dashboard'
]);

Route::get('/betaling', [
    'uses' => 'DashboardController@after_register',
    'as'   => 'betaling'
]);

Route::get('/nieuw', [
    'uses' => 'DashboardController@after_first_payment',
    'as'   => 'nieuw'
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

// Route::get('/',function(){
//     return App::call('\App\Http\Controllers\Auth\LoginController@login');
// });

