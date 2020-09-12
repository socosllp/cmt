<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//LoginPage @ UserController
Route::post('register', 'UserController@register');

Route::post('login', 'UserController@login');

Route::get('profile', 'UserController@getAuthenticatedUser');

//Irf Register & IRF Controller
Route::post('irf_register', 'IrfController@irf_register');

Route::get('users','IrfController@showallusers');

Route::post ('irf_search','IrfController@irf_search');

//Route::get('user/{id}','IrfController@showuserbyid');

Route::post('adduser','IrfController@adduser');

Route::post('addonlyuser','IrfController@addonlyuser');

Route::post('irf','IrfController@irf');

Route::post('deleteuser','IrfController@deleteuser');

Route::post('addchild','IrfController@addchild'); 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});