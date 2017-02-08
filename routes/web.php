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

Route::get('/', 'AdminController@show');

// ---------------- BRAND MAINTENANCE -----------------
Route::post('/brandSave','AdminController@brandSave');
Route::get('/brandRemove/{name}','AdminController@brandRemove');
Route::get('/brandUpdate/{name}/{newname}','AdminController@brandUpdate');
//----------------- END BRAND MAINTENANCE --------------

// ---------------- CATEGORY MAINTENANCE -----------------
Route::post('/categorySave','AdminController@categorySave');
Route::get('/categoryRemove/{name}','AdminController@categoryRemove');
Route::get('/categoryUpdate/{name}/{newname}','AdminController@categoryUpdate');
//----------------- END CATEGORY MAINTENANCE --------------

// ---------------- SIZE MAINTENANCE -----------------
Route::post('/sizeSave','AdminController@sizeSave');
Route::get('/sizeRemove/{name}','AdminController@sizeRemove');
Route::get('/sizeUpdate/{name}/{newname}','AdminController@sizeUpdate');
//----------------- END SIZE MAINTENANCE --------------

Route::post('/register','UserController@register');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/got', [
  'middleware' => ['auth'],
  'uses' => function () {
   echo "You are allowed to view this page!";
}]);