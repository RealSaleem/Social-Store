<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });
Route::get('/', 'App\Http\Controllers\WelcomeController@welcome');
Auth::routes();
Route::get('/activate_user/{token}', 'App\Http\Controllers\API\AppUserController@activateAccount');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/image_upload', 'App\Http\Controllers\ImageController@imageUplaod');
Route::resource('about', 'App\Http\Controllers\AboutController')->name('*','about');
Route::resource('privacy', 'App\Http\Controllers\PrivacyController')->name('*','privacy');
Route::resource('terms', 'App\Http\Controllers\TermsConditionsController')->name('*','terms');
Route::resource('category', 'App\Http\Controllers\CategoryController')->name('*','category');
Route::resource('country', 'App\Http\Controllers\CountryController')->name('*','country');
Route::resource('user', 'App\Http\Controllers\UserController')->name('*','user');
Route::resource('contact', 'App\Http\Controllers\ContactController')->name('*','contact');
Route::resource('notification', 'App\Http\Controllers\NotificationController')->name('*','notification');
Route::resource('reportedusers', 'App\Http\Controllers\ReportedUsersController')->name('*','reportedusers');
Route::resource('setting', 'App\Http\Controllers\SettingController')->name('*','setting');
Route::resource('ads', 'App\Http\Controllers\AdsController')->name('*','ads');
Route::resource('reportedposts', 'App\Http\Controllers\ReportedPostsController')->name('*','reportedposts');
Route::resource('bids', 'App\Http\Controllers\BidsController')->name('*','bids');
Route::resource('stories', 'App\Http\Controllers\StoriesController')->name('*','stories');




