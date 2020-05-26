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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reg', 'UserController@reg');
Route::get('/log', 'UserController@log')->name('log');
Route::post('/signup', 'UserController@signup');
Route::post('/signin', 'UserController@signin');
Route::get('/logoff', 'UserController@logoff');
Auth::routes();


Route::group(['middleware' => 'auth'], function()
{
    
Route::get('/homes', 'UserController@home')->name('homes');
Route::get('/createplan', 'PlanController@create')->name('create');
Route::post('/saveplan', 'PlanController@saveplan')->name('saveplan');

Route::get('/plan/{plan}', 'PlanController@plan')->name('plan');

Route::get('/edit/{plan}', 'PlanController@edit')->name('edit');

Route::post('/update', 'PlanController@update')->name('update');

Route::get('/transfer/{plan}', 'PlanController@transfer')->name('transfer');

Route::post('/send', 'PlanController@sendFund')->name('send');

Route::get('/plan', 'PlanController@getEdit')->name('plan');

Route::get('/history', 'PlanController@getHistory')->name('history');

Route::post('/topup', 'PaymentController@topup')->name('topup');

Route::post('/checkout', 'PaymentController@checkout')->name('checkout');

Route::get('/addmoney/{plan}', 'PaymentController@addmoney')->name('addmoney');

Route::get('/withdraw/{plan}', 'PlanController@withdraw')->name('withdraw');

Route::post('/withdraw', 'PlanController@debit')->name('debit');

});





Route::get('/home', 'HomeController@home')->name('home');
