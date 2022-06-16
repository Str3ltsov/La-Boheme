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
    /*
     * Home
     */
    Route::get('/', [Admin\HomeController::class, 'index'])
        ->name('admin.home');
    /*
     * Reservations
     */
    Route::get('/reservations', [Admin\ReservationsController::class, 'index'])
        ->name('admin.reservations');
    Route::put('/reservations', [Admin\ReservationsController::class, 'updateReservationStatus'])
        ->name('admin.reservations.updateReservationStatus');
    /*
     * Tables
     */
    Route::get('/tables', [Admin\TablesController::class, 'index'])
        ->name('admin.tables');
    Route::post('/tables/create', [Admin\TablesController::class, 'create'])
        ->name('admin.tables.create');
    Route::get('/tables/{table}', [Admin\TablesController::class, 'show'])
        ->name('admin.tables.show');
    Route::delete('/tables/{table}', [Admin\TablesController::class, 'destroy'])
        ->name('admin.tables.destroy');
    /*
     * Table unavailable dates
     */
    Route::post('/tables/{table}/create_unavailable_date', [Admin\TablesController::class, 'createUnavailableDate'])
        ->name('admin.tables.createUnavailableDate');
    Route::delete('/tables/{table}/delete_unavailable_date', [Admin\TablesController::class, 'deleteUnavailableDate'])
        ->name('admin.tables.deleteUnavailableDate');
    /*
     * Table unavailable date times
     */
    Route::post('/tables/{table}/create_unavailable_datetime', [Admin\TablesController::class, 'createUnavailableDateTime'])
        ->name('admin.tables.createUnavailableDateTime');
    Route::delete('/tables/{table}/delete_unavailable_datetime', [Admin\TablesController::class, 'deleteUnavailableDateTime'])
        ->name('admin.tables.deleteUnavailableDateTime');
});

/*
 * Other
 */
Auth::routes();
