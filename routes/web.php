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

Route::middleware('web')->group(function () {

    Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

    Auth::routes(['verify' => true]);

    Route::middleware(['auth', 'verified'])->group(function () {
        
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/home/all', [App\Http\Controllers\HomeController::class, 'findAll'])->name('home_all');
        Route::post('/home/search', [App\Http\Controllers\HomeController::class, 'search'])->name('home_search');
        Route::post('/home/name', [App\Http\Controllers\HomeController::class, 'findName'])->name('home_name');

        Route::middleware(['client'])->group(function () {
            Route::get('/rendezvous/{id}', [App\Http\Controllers\User\RendezVousController::class, 'index'])->where('id', '^[1-9]+$')->name('rv');
            Route::post('/rendezvous/{id}', [App\Http\Controllers\User\RendezVousController::class, 'take'])->where('id', '^[1-9]+$')->name('rv');
            Route::get('/profile/history', [App\Http\Controllers\User\HistoryController::class, 'history'])->name('profile.history');
            Route::get('/profile/crv', [App\Http\Controllers\User\CancelController::class, 'index'])->name('profile.crv');
            Route::get('/profile/crv/cancel/{id}', [App\Http\Controllers\User\CancelController::class, 'cancel'])->where('id', '^[1-9]+$')->name('profile.cancel');
        });

        Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile');
        Route::middleware(['admin'])->group(function () {
            Route::get('/profile/approvals', [App\Http\Controllers\User\ApproveController::class, 'index'])->name('profile.approvals');
            Route::get('/profile/approvals/approve/{id}', [App\Http\Controllers\User\ApproveController::class, 'approve'])->where('id', '^[1-9]+$');
            Route::get('/profile/approvals/deny/{id}', [App\Http\Controllers\User\ApproveController::class, 'deny'])->where('id', '^[1-9]+$');
        });

        Route::middleware(['doctor'])->group(function () {
            Route::get('/profile/calendar', [App\Http\Controllers\User\CalendarController::class, 'index'])->name('profile.calendar');
            Route::post('/profile/calendar', [App\Http\Controllers\User\CalendarController::class, 'add']);
            Route::get('/profile/rv_request', [App\Http\Controllers\User\AcceptController::class, 'index'])->name('profile.rvr');
            Route::get('/profile/rv_request/accept/{id}', [App\Http\Controllers\User\AcceptController::class, 'accept'])->where('id', '^[1-9]+$')->name('profile.accept');
            Route::get('/profile/rv_request/reject/{id}', [App\Http\Controllers\User\AcceptController::class, 'reject'])->where('id', '^[1-9]+$')->name('profile.reject');
            Route::get('/profile/rv', [App\Http\Controllers\User\ConcludeController::class, 'index'])->name('profile.rv');
            Route::get('/profile/rv/conclude/{id}', [App\Http\Controllers\User\ConcludeController::class, 'redirectTo'])->where('id', '^[1-9]+$')->name('profile.redirectTo');
            Route::post('/profile/rv/conclude/{id}', [App\Http\Controllers\User\ConcludeController::class, 'conclude'])->where('id', '^[1-9]+$')->name('profile.conclude');
            // Route::get('/profile/calendar/edit/{id},{date},{time},{st}', [App\Http\Controllers\User\CalendarController::class, 'edit'])->where([
            //     'id' => '',
            //     'date' => '',
            //     'time' => '',
            //     'st' => '',
            // ]);
            Route::get('/profile/tarif', [App\Http\Controllers\User\TarifController::class, 'index'])->name('profile.tarif');
            Route::post('/profile/tarif', [App\Http\Controllers\User\TarifController::class, 'add']);
        });

    });

    Route::get('/apply', [App\Http\Controllers\User\ApplyController::class, 'index'])->name('apply');
    Route::post('/apply', [App\Http\Controllers\User\ApplyController::class, 'register']);

});