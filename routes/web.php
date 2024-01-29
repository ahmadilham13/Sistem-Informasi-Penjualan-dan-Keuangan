<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
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
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
