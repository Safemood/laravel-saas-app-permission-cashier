<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EventController;

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


Route::get('/dashboard', function () {
    return view('dashboard',[
        'intent' => auth()->user()->createSetupIntent()
    ]);
})->middleware(['auth','isSubscribed'])->name('dashboard');

Route::post('/subscribe',[SubscriptionController::class,'subscribe'])->middleware(['auth'])->name('subscribe');


Route::name('subscribed.')
        ->middleware(['auth','role:standard-user|premium-user'])
        ->group( function () {
 
            Route::view('subscribed/dashboard', 'subscribed.dashboard')->name('dashboard');

            Route::resource('tasks', TaskController::class)
                ->middleware(['permission:list tasks|edit tasks|create tasks|delete tasks']);

            Route::resource('events', EventController::class)
                ->middleware(['permission:list events|edit events|create events|delete events']);
            
});

 




require __DIR__.'/auth.php';