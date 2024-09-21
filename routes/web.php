<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('reservations', ReservationController::class);
Route::resource('users', UserController::class)
    ->only(['index', 'edit', 'update']);

Route::resource('facilities', FacilityController::class)
    ->only(['index']);

Route::get('/reservations/confirm', [ReservationController::class, 'confirm'])
    ->name('reservations.confirm');

// 予約保存用のルート（POST）
Route::post('/reservations', [ReservationController::class, 'store'])
->name('reservations.store');
