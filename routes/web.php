<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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
    'as' => 'front.'
], function() {

    Route::group([
        'middleware' => ['guest:customer,user']
    ], function() {
        Route::view('/login', 'login')->name('login');
        Route::view('/register', 'register')->name('register');
    });

    Route::group([
        'as' => 'auth.'
    ], function() {

        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::post('/register', [RegisterController::class, 'register'])->name('register');
        Route::post('/logout/{email}', [LoginController::class, 'logout'])->name('logout');
    });


    require __DIR__ . '/front.php';
});

