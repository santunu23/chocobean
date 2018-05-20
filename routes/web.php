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
    return view('/auth/login');
});

Auth::routes();
Route::get('/admin/admindashboard','AdminDashboard@index');
Route::post('/admin/admindashboard','AdminDashboard@destroy');
Route::get('/admin/adminIteminsert','AdminDashboard@newItem');
Route::resource('/admin/admindashboard','AdminDashboard');
Route::post('/admin/admindashboard','AdminDashboard@store');
Route::get('/admin/managedeleterecords','AdminDashboard@temDelete');
Route::get('/admin/managedeleterecord/{id}','AdminDashboard@perdelete');
Route::get('/admin/managedeleterecords/{id}','AdminDashboard@restore');
Route::get('/admin/manageuser',function(){
return view('/admin/registerUsers');
});
Route::post('/admin/registerUsers','AdminDashboard@registerusers');
Route::get('publicpage','AdminDashboard@publicpage');
Route::get('/publicpage/addToCart/{id}','AdminDashboard@getAddToCart');
Route::get('/publicpage/shoppingcart','AdminDashboard@calculateCart');

