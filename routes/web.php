<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::prefix('dashboard')->group(function () {
    Route::name('dashboard.')->group(function () {
        Route::controller(DashboardController::class)->group(function () {

            Route::get('/index', 'index')->name('index');

        });
    });
});

Route::prefix('master')->group(function () {
    Route::name('master.')->group(function () {
        Route::controller(MasterController::class)->group(function () {

            Route::get('/partai-data', 'partaiData')->name('partaiData');

        });
    });
});