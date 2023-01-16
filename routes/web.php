<?php

use App\Http\Controllers\MusicListingController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;
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
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => 'auth'],function() {
    Route::resource('tracks', Controllers\TrackController::class);
    Route::resource('comments', Controllers\CommentController::class);
    Route::resource('users',Controllers\UserController::class);
});
//pls ignore


