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
//Helper
Route::get('/announcements/applied', 'App\Http\Controllers\HelperController@list')
    ->middleware(['auth'])->name('helper.list');

Route::get('/announcements/{id}/helpers', 'App\Http\Controllers\HelperController@specifiedAnnouncement')
    ->middleware(['auth'])->name('helper.specifiedAnnouncement');

Route::post('/announcement/apply/{id}', 'App\Http\Controllers\HelperController@apply')
    ->middleware(['auth'])->name('announcement.apply');

Route::post('/announcements/{announcementId}/select/{helperId}', 'App\Http\Controllers\HelperController@select')
    ->middleware(['auth'])->name('helper.select');

Route::delete('/helper/destroy/{id}', 'App\Http\Controllers\HelperController@destroy')
    ->middleware(['auth'])->name('helper.destroy');
// Announcements
Route::get('/announcements', 'App\Http\Controllers\AnnouncementController@index')
    ->name('announcement.index');

Route::post('/announcements', 'App\Http\Controllers\AnnouncementController@index')
    ->name('announcement.index');

Route::get('/announcements/create', 'App\Http\Controllers\AnnouncementController@create')
    ->middleware(['auth'])->name('announcement.create');

Route::post('/announcements/create', 'App\Http\Controllers\AnnouncementController@store')
    ->middleware(['auth'])->name('announcement.create');

Route::get('/announcements/list', 'App\Http\Controllers\AnnouncementController@list')
    ->middleware(['auth'])->name('announcement.list');

Route::get('/announcements/{id}', 'App\Http\Controllers\AnnouncementController@show')
    ->name('announcement.show');

Route::delete('/announcements/{id}', 'App\Http\Controllers\AnnouncementController@destroy')
    ->middleware(['auth'])->name('announcement.destroy');

Route::get('/announcement/edit/{id}', 'App\Http\Controllers\AnnouncementController@edit')
    ->middleware(['auth'])->name('announcement.edit');

Route::patch('/announcement/edit/{id}', 'App\Http\Controllers\AnnouncementController@update')
    ->middleware(['auth'])->name('announcement.edit');
// Users
Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')
    ->name('user.show');

Route::get('/user/edit/{id}', 'App\Http\Controllers\UserController@edit')
    ->middleware(['auth'])->name('user.edit');

Route::patch('/user/edit/{id}', 'App\Http\Controllers\UserController@update')
    ->middleware(['auth'])->name('user.edit');

Route::delete('/user/delete/{id}', 'App\Http\Controllers\UserController@destroy')
    ->middleware(['auth'])->name('user.destroy');

// Reports
Route::post('/report/add/{type}/{id}', 'App\Http\Controllers\ReportController@store')
    ->middleware(['auth'])->name('report.report');

// Backend
Route::get('/users', 'App\Http\Controllers\UserController@index')
    ->middleware(['admin'])->name('backend.user.index');

Route::post('/user/promote/{id}', 'App\Http\Controllers\UserController@promote')
    ->middleware(['admin'])->name('backend.user.promote');

Route::get('/category', 'App\Http\Controllers\CategoryController@index')
    ->middleware(['admin'])->name('backend.category.index');

Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@destroy')
    ->middleware(['admin'])->name('backend.category.destory');

Route::post('/category', 'App\Http\Controllers\CategoryController@store')
    ->middleware(['admin'])->name('backend.category.store');

Route::get('/report', 'App\Http\Controllers\ReportController@index')
    ->middleware(['modo'])->name('backend.report.index');

Route::delete('/report/{id}', 'App\Http\Controllers\ReportController@destroy')
    ->middleware(['modo'])->name('backend.report.destroy');

Route::get('/punishment', 'App\Http\Controllers\PunishmentController@index')
    ->middleware(['modo'])->name('backend.punishment.index');

Route::post('/punish/user/{id}', 'App\Http\Controllers\PunishmentController@punish')
    ->middleware(['modo'])->name('backend.punishment.punish');

Route::post('/punish/stopPunishment/{id}', 'App\Http\Controllers\PunishmentController@stopPunishment')
->middleware(['modo'])->name('backend.punishment.stopPunishment');

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['modo'])->name('dashboard');

require __DIR__.'/auth.php';
