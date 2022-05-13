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

Illuminate\Support\Facades\Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signedlink', function() {
    $response = Illuminate\Support\Facades\Http::get("https://quickchart.io/chart?bkg=white&c={type:%27bar%27,data:{labels:[2012,2013,2014,2015,2016],datasets:[{label:%27Users%27,data:[120,60,50,180,120]}]}}");
    return dd($response);
    return request()->ip();
    return Illuminate\Support\Facades\URL::temporarySignedRoute(
        'unsubscribe', now()->addMinutes(2), ['user' => 1]
    );
})->name('create.signedlink');

Route::get('/unsubscribe/{user}', function (Illuminate\Http\Request $request) {
    if (! $request->hasValidSignature()) {
        abort(401);
    }
 
 })->name('unsubscribe')->middleware('signed');

Route::get('/admin', function() {

    $users = \App\Models\User::whereYear('created_at', '2022')->get();
    
    $dates = $users->pluck('created_at');
    
    $datesFormatted = $dates->map(function($date){
        return $date->month -1;
    });

    $months = $datesFormatted->countBy()->sortKeys();

    if($months->first() != 0) {
        $data = $months->pad(-12, 0);
    }

    $notifications = auth()->user()->unreadNotifications;

    // dd($notifications->count());

    return view('admin')->with('months', $data->toJson())->with(compact('notifications'));
});

Route::get('/mark-as-read', function(){
    //auth()->user()->unreadNotifications->markAsRead();
    //O tambien sin traerte las notificaciones de la bbdd
    auth()->user()->unreadNotifications()->update(['read_at' => now()]);
return back();
})->name('markNotification');

Route::view('/fullcalendar', 'calendar');

Route::post('/toast', function() {
    return redirect()->back()->withInput()->with('status', 'Profile updated!');;
})->name('toast');


