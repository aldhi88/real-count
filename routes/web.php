<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SaksiController;
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

Route::get('/', function(){
    if(Auth::check()){
        return redirect()->route('dashboard.index');
    }
    return redirect()->route('auth.login');
})->name('anchor');

Route::prefix('auth')->group(function () {
    Route::name('auth.')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::middleware('guest')->group(function(){
                Route::get('/login', 'login')->name('login');
            });
            Route::middleware('auth:web')->group(function(){
                Route::get('/logout', 'logout')->name('logout');
            });
        });
    });
});

Route::middleware('auth:web')->group(function(){

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
                Route::get('/dapil-data', 'dapilData')->name('dapilData');
                Route::get('/saksi-data', 'saksiData')->name('saksiData');
    
                Route::get('/partai-data-dt', 'partaiDataDt')->name('partaiDataDt');
                Route::get('/tps-data-dt', 'tpsDataDt')->name('tpsDataDt');
                Route::get('/dapil-data-dt', 'dapilDataDt')->name('dapilDataDt');
                Route::get('/calon-data-dt', 'calonDataDt')->name('calonDataDt');
                Route::get('/kecamatan-data-dt', 'kecamatanDataDt')->name('kecamatanDataDt');
                Route::get('/kelurahan-data-dt', 'kelurahanDataDt')->name('kelurahanDataDt');
                Route::get('/saksi-data-dt', 'saksiDataDt')->name('saksiDataDt');
            });
        });
    });

    Route::prefix('saksi')->group(function () {
        Route::name('saksi.')->group(function () {
            Route::controller(SaksiController::class)->group(function () {
    
                Route::get('/form-hasil', 'formHasil')->name('formHasil');
                
            });
        });
    });

    Route::prefix('rekap')->group(function () {
        Route::name('rekap.')->group(function () {
            Route::controller(RekapController::class)->group(function () {
    
                Route::get('/rekap-per-dapil/{dapilId}', 'rekapPerDapil')->name('rekapPerDapil');
                
                Route::get('/rekap-per-dapil-dt', 'rekapPerDapilDt')->name('rekapPerDapilDt');
            });
        });
    });

});

