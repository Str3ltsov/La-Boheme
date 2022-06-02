<?php

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

/*
 * Guest
 */
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reservation', App\Http\Livewire\ReservationForm::class)
    ->name('livewire.reservation.form');

/*
 * Admin
 */
Route::group(['prefix' => 'admin', 'middleware' => ['admin.authorization']], function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
});

/*
 * Other
 */
Auth::routes();
