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

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile');
    Route::middleware(['admin'])->group(function () {
        Route::get('/profile/approvals', [App\Http\Controllers\User\ApproveController::class, 'index'])->name('profile.approvals');
        Route::get('/profile/approvals/approve/{id}', [App\Http\Controllers\User\ApproveController::class, 'approve'])->where('id', '^[1-9]+$');
        Route::get('/profile/approvals/deny/{id}', [App\Http\Controllers\User\ApproveController::class, 'deny'])->where('id', '^[1-9]+$');
    });

});

Route::get('/apply', [App\Http\Controllers\User\ApplyController::class, 'index'])->name('apply');
Route::post('/apply', [App\Http\Controllers\User\ApplyController::class, 'register']);