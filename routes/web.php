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
});

Route::get('/admin', function() {
    $users = \App\Models\User::whereYear('created_at', '2021')->get();
    
    $dates = $users->pluck('created_at');
    
    $datesFormatted = $dates->map(function($date){
        return $date->month -1;
    });

    $months = $datesFormatted->countBy()->sortKeys();

    if($months->first() != 0) {
        $data = $months->pad(-12, 0);
    }

    // dd($data->toJson());

    return view('admin')->with('months', $data->toJson());
});