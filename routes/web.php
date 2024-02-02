<?php

use App\Http\Controllers\Bibit\ProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\Modal\ModalController;
use App\Http\Controllers\Petugas\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Saldo\SaldoController;
use App\Http\Controllers\Transaksi\TransaksiController;
use App\Models\Saldo;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Support\Facades\Auth;
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
    if(!Auth::check()) {
        return redirect()->route('login');
    }

    return redirect()->route('index');
});

Route::prefix('/')->middleware(['auth'])->controller(IndexController::class)->group(function () {
    Route::get('dashboard', '__invoke')->name('index');

    Route::prefix('profile/')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('', 'edit')->name('edit');
        Route::put('avatar', 'changeAvatar')->name('avatar');
        Route::patch('', 'update')->name('update');
    });

    Route::prefix('saldo/')->name('saldo.')->controller(SaldoController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('add', 'create')->name('create');
        Route::post('', 'store')->name('store');
    });

    Route::prefix('modal/')->name('modal.')->controller(ModalController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('add', 'create')->name('create');
        Route::post('', 'store')->name('store');

        Route::prefix('{modal}/')->group(function () {
            Route::get('', 'show')->name('show');
            Route::get('edit', 'edit')->name('edit');
            Route::put('', 'update')->name('update')->middleware(HandlePrecognitiveRequests::class);
            Route::delete('', 'destroy')->name('destroy')->middleware(HandlePrecognitiveRequests::class);
        });
    });

    Route::prefix('petugas/')->name('petugas.')->controller(UserController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('', 'store')->name('store')->middleware(HandlePrecognitiveRequests::class);

        Route::prefix('{user}/')->group(function () {
            Route::get('', 'show')->name('show');
            Route::get('edit', 'edit')->name('edit');
            Route::put('', 'update')->name('update')->middleware(HandlePrecognitiveRequests::class);
            Route::delete('', 'destroy')->name('destroy')->middleware(HandlePrecognitiveRequests::class);
        });
    });

    Route::prefix('product/')->name('product.')->controller(ProductController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('', 'store')->name('store')->middleware(HandlePrecognitiveRequests::class);

        Route::prefix('{product}/')->group(function () {
            Route::get('', 'show')->name('show');
            Route::get('edit', 'edit')->name('edit');
            Route::put('', 'update')->name('update')->middleware(HandlePrecognitiveRequests::class);
            Route::delete('', 'destroy')->name('destroy')->middleware(HandlePrecognitiveRequests::class);
        });
    });

    Route::prefix('transaksi/')->name('transaksi.')->controller(TransaksiController::class)->group(function () {
        Route::get('', 'index')->name('index');
    });

    Route::prefix('laporan/')->name('laporan.')->controller(LaporanController::class)->group(function () {
        Route::get('', 'index')->name('index');
    });
});

require __DIR__.'/auth.php';
