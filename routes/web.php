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
Route::get('logout','LoginController@logout');
Route::post('login-page','LoginController@login_page');

Route::group(['middleware' => 'dashboard'], function () {
	Route::get('dashboard', function () 
		{return view('index');}
	);
	Route::get('dashboard-pie-chart','DashboardController@dashboard');
	
 	Route::get('pending-page/{id}','PayoutController@pending_payout');
 	Route::post('update-payout','PayoutController@update_payout');
});

Route::group(['middleware' =>['mainadmin',]], function () {


Route::get('products','MastersController@products') ;
Route::get('product_types','MastersController@product_types');
Route::get('statuses','MastersController@Statuses');
Route::get('role','MastersController@role');
Route::get('user','MastersController@user');
Route::get('products/view/{id}','MastersController@view');
Route::get('products/edit/{id}','MastersController@edit');
Route::post('products-edit-submit','MastersController@products_edit_submit');
Route::get('products/delete/{id}','MastersController@delete');
Route::get('products-add','MastersController@add');
Route::post('products-add-submit','MastersController@products_add_submit');

/*Product Type*/
Route::get('product_types/view/{id}','MastersController@product_types_view');
Route::get('products-types/edit/{id}','MastersController@product_types_edit');
Route::post('product-types-edit-submit','MastersController@product_types_edit_submit');
Route::get('product-types/delete/{id}','MastersController@product_type_delete');

/*Status*/
Route::get('status/view/{id}','MastersController@status_view');
Route::get('status/edit/{id}','MastersController@status_edit');
Route::post('status-edit-submit','MastersController@status_edit_submit');
Route::get('status/delete/{id}','MastersController@status_delete');

/*Role*/
Route::get('role/view/{id}','MastersController@role_view');
Route::get('role/edit/{id}','MastersController@role_edit');
Route::post('role-edit-submit','MastersController@role_edit_submit');
Route::get('role/delete/{id}','MastersController@role_delete');

/*Users*/
Route::get('users/view/{id}','MastersController@users_view');
// Route::get('role/edit/{id}','MastersController@role_edit');
// Route::post('role-edit-submit','MastersController@role_edit_submit');
// Route::get('role/delete/{id}','MastersController@role_delete');
});


