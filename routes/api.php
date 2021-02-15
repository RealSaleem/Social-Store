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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'App\Http\Controllers\API\AppUserController@login');
Route::post('register', 'App\Http\Controllers\API\AppUserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'App\Http\Controllers\API\AppUserController@details');
Route::post('contact', 'App\Http\Controllers\API\ContactController@contactus');
Route::post('reporteduser', 'App\Http\Controllers\API\ReportedUsersController@reporteduser');
});