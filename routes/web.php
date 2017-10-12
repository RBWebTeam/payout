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

// Route::get('/', function () {
//     return view('index');
// });


// Route::get('1', function () {
//     return view('index1');
// });
Route::get('/','LoginController@login');
Route::post('login-page','LoginController@login_page');

Route::group(['middleware' => 'dashboard'], function () {
	Route::get('dashboard', function () 
		{return view('index');}
	);
	
 	Route::get('pending-page','PayoutController@pending_payout');
});

Route::group(['middleware' =>['mainadmin',]], function () {

Route::get('products','MastersController@products') ;
Route::get('product_types','MastersController@product_types');
Route::get('statuses','MastersController@Statuses');
Route::get('role','MastersController@role');
Route::get('user','MastersController@user');
});


