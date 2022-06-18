<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify' => true]);

//Route::impersonate();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

Route::group([
    //'middleware' => [],
    'prefix' => 'admin',
    'as' => 'admin.',
],

function () {
    Route::resource('/tasks', App\Http\Controllers\TaskController::class);

});

Route::get('/gettasks',[App\Http\Controllers\TaskController::class, 'getTasks'])->name('getTasks'); 

Route::get('notifications/get', [App\Http\Controllers\NotificationsController::class, 'getNotificationsData']);
