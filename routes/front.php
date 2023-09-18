<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
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

Route::group([
    'middleware' => ['auth:customer,user']
], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/agenda', [ScheduleController::class, 'index'])->name('schedule');
    Route::post('/agenda', [ScheduleController::class, 'scheduleService'])->name('scheduleService');

    Route::get('/perfil', [ProfileController::class, 'index'])->name('profile');


});

