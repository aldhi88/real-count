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
            Route::get('/partai-data', 'partaiData')->name('partaiData');
            Route::get('/calon-data', 'calonData')->name('calonData');
            Route::get('/tps-data', 'tpsData')->name('tpsData');
            Route::get('/kecamatan-data', 'kecamatanData')->name('kecamatanData');
            Route::get('/kelurahan-data', 'kelurahanData')->name('kelurahanData');
            Route::get('/dapil-data', 'dapilData')->name('dapilData');

            Route::get('/partai-data-dt', 'partaiDataDt')->name('partaiDataDt');
<<<<<<< HEAD
            Route::get('/tps-data-dt', 'tpsDataDt')->name('tpsDataDt');
=======
            Route::get('/dapil-data-dt', 'dapilDataDt')->name('dapilDataDt');
            Route::get('/calon-data-dt', 'calonDataDt')->name('calonDataDt');
            Route::get('/kelurahan-data-dt', 'kelurahanDataDt')->name('kelurahanDataDt');
>>>>>>> 4a2938896307a7918aa3c6657ff3ef08e929964d
        });
    });
});
