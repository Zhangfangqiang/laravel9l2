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


Auth::routes();

//邮箱验证界面
Route::get('/email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/verification-notification', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');


Route::get('/', 'PagesController@root')->name('root');
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
