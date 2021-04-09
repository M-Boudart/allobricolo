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

Route::get('/', 'App\Http\Controllers\WelcomeController@index')
    ->name('welcome');

Route::get('/announcements', 'App\Http\Controllers\AnnouncementController@index')
    ->name('announcement.index');

Route::post('/announcements', 'App\Http\Controllers\AnnouncementController@index')
    ->name('announcement.index');

Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')
    ->name('user.show');

Route::get('/user/edit/{id}', 'App\Http\Controllers\UserController@edit')
    ->middleware(['auth'])->name('user.edit');

Route::patch('/user/edit/{id}', 'App\Http\Controllers\UserController@update')
    ->middleware(['auth'])->name('user.edit');

Route::delete('/user/delete/{id}', 'App\Http\Controllers\UserController@destroy')
    ->middleware(['auth'])->name('user.destroy');

Route::get('/workers', 'App\Http\Controllers\UserController@workers')
    ->name('user.workers');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
