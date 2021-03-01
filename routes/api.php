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

Route::post('login', 					'App\Http\Controllers\API\AppUserController@login');
Route::post('register',					'App\Http\Controllers\API\AppUserController@register');
Route::post('reset_password_request',	'App\Http\Controllers\API\AppUserController@reset_password_request');
Route::post('verfy_token',				'App\Http\Controllers\API\AppUserController@verfy_token');
Route::post('reset_password',			'App\Http\Controllers\API\AppUserController@reset_password');


Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'App\Http\Controllers\API\AppUserController@details');
Route::post('contact', 'App\Http\Controllers\API\ContactController@contactus');
Route::post('reporteduser', 'App\Http\Controllers\API\ReportedUsersController@reporteduser');
Route::post('ads', 'App\Http\Controllers\API\AdsController@ads');
Route::post('reportedposts', 'App\Http\Controllers\API\ReportedPostsController@reportedposts');
});