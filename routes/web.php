<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\UserController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Diff\Output\DiffOnlyOutputBuilder;

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

Route::get('/', [ReservationController::class, 'initial'])->name('reservations.initial');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// 一般ユーザー
Route::resource('reservations', ReservationController::class)
    ->middleware(['auth']);

// 管理者
Route::resource('users', UserController::class)
    ->only(['index', 'edit', 'update'])
    ->middleware(['auth', 'can:admin']);

Route::get('/reservations/create/timeselect', [ReservationController::class, 'timeselect'])
    ->name('reservations.timeselect');

// 予約保存用のルート（POST）
Route::post('/reservations', [ReservationController::class, 'store'])
    ->name('reservations.store');

// 予約完了画面へのルートを設定
Route::get('/reservations/complete', [ReservationController::class, 'complete'])
    ->name('reservations.complete');
