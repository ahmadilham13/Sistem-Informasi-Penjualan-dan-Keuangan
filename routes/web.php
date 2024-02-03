<?php

use App\Http\Controllers\Bibit\ProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Kasir\KasirController;
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
        Route::get('', 'index')->name('index')->can('saldo.index');
        Route::get('add', 'create')->name('create')->can('saldo.store');
        Route::post('', 'store')->name('store')->can('saldo.store');
    });

    Route::prefix('modal/')->name('modal.')->controller(ModalController::class)->group(function () {
        Route::get('', 'index')->name('index')->can('modal.index');
        Route::get('add', 'create')->name('create')->can('modal.store');
        Route::post('', 'store')->name('store')->can('modal.store');

        Route::prefix('{modal}/')->group(function () {
            Route::get('', 'show')->name('show')->can('modal.show', 'modal');
            Route::get('edit', 'edit')->name('edit')->can('modal.update', 'modal');
            Route::put('', 'update')->name('update')->middleware(HandlePrecognitiveRequests::class)->can('modal.update', 'modal');
            Route::delete('', 'destroy')->name('destroy')->middleware(HandlePrecognitiveRequests::class)->can('modal.destroy', 'modal');
        });
    });

    Route::prefix('petugas/')->name('petugas.')->controller(UserController::class)->group(function () {
        Route::get('', 'index')->name('index')->can('petugas.index');
        Route::get('create', 'create')->name('create')->can('petugas.store');
        Route::post('', 'store')->name('store')->middleware(HandlePrecognitiveRequests::class)->can('petugas.store');

        Route::prefix('{user}/')->group(function () {
            Route::get('', 'show')->name('show')->can('petugas.show', 'user');
            Route::get('edit', 'edit')->name('edit')->can('petugas.update', 'user');
            Route::put('', 'update')->name('update')->middleware(HandlePrecognitiveRequests::class)->can('petugas.update', 'user');
            Route::delete('', 'destroy')->name('destroy')->middleware(HandlePrecognitiveRequests::class)->can('petugas.destroy', 'index');
        });
    });

    Route::prefix('product/')->name('product.')->controller(ProductController::class)->group(function () {
        Route::get('', 'index')->name('index')->can('product.index');
        Route::get('create', 'create')->name('create')->can('product.store');
        Route::post('', 'store')->name('store')->middleware(HandlePrecognitiveRequests::class)->can('product.store');

        Route::prefix('{product}/')->group(function () {
            Route::get('', 'show')->name('show')->can('product.show', 'product');
            Route::get('edit', 'edit')->name('edit')->can('product.update', 'product');
            Route::put('', 'update')->name('update')->middleware(HandlePrecognitiveRequests::class)->can('product.update', 'product');
            Route::delete('', 'destroy')->name('destroy')->middleware(HandlePrecognitiveRequests::class)->can('product.destroy', 'product');
        });
    });

    Route::prefix('transaksi/')->name('transaksi.')->controller(TransaksiController::class)->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('', 'store')->name('store')->middleware(HandlePrecognitiveRequests::class);

        Route::prefix('{transaksi}/')->group(function () {
            Route::get('', 'show')->name('show');
        });
    });

    Route::prefix('kasir/')->name('kasir.')->controller(KasirController::class)->group(function () {
        Route::post('', 'store')->name('store')->middleware(HandlePrecognitiveRequests::class);

        Route::prefix('{kasir}/')->group(function () {
            Route::delete('', 'destroy')->name('destroy');
        });
    });

    Route::prefix('laporan/')->name('laporan.')->controller(LaporanController::class)->group(function () {
        Route::get('', 'index')->name('index');
    });
});

require __DIR__.'/auth.php';
