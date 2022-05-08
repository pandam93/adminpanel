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
    $users = \App\Models\User::get(['created_at']);

    //$users = \App\Models\User::whereYear('created_at', '=', Carbon\Carbon::now()->year)->get(['created_at']);
    $months = $users->map(function ($item, $key) {
        return $item->created_at->month;
    });

    $monthGraph = [ 0 => 0,
                    1 => 0,
                    2 => 0,
                    3 => 0,
                    4 => 0,
                    5 => 0,
                    6 => 0,
                    7 => 0,
                    8 => 0,
                    9 => 0,
                    10 => 0,
                    11 => 0 ];
    
    foreach($months->sort()->all() as $value) {
        
        $monthGraph[$value -1] += 1;
    }

    //dd($monthGraph, $months->sort()->all());
    
    return view('admin')->with('months', $monthGraph);
});