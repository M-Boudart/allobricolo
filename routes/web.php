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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/announcements', 'App\Http\Controllers\AnnouncementController@index')
    ->name('announcement.index');

Route::post('/announcements', 'App\Http\Controllers\AnnouncementController@index')
    ->name('announcement.index');

Route::get('/workers', 'App\Http\Controllers\UserController@workers')
    ->name('worker.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
