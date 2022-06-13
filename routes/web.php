<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;
use App\Http\Livewire\ReservationForm;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/reservation', ReservationForm::class)
    ->name('livewire.reservation');
Route::view('/reservation/saved', 'reservation_saved')
    ->name('reservation.saved');

/*
 * Admin
 */
Route::group(['prefix' => 'admin', 'middleware' => ['admin.authorization']], function () {
    Route::get('/', [Admin\HomeController::class, 'index'])
        ->name('admin.home');
    Route::get('/reservations', [Admin\ReservationsController::class, 'index'])
        ->name('admin.reservations');
    Route::put('/reservations', [Admin\ReservationsController::class, 'updateReservationStatus'])
        ->name('admin.reservations.updateReservationStatus');
});

/*
 * Other
 */
Auth::routes();
