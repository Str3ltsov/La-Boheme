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
    Route::group(['prefix' => 'reservations'], function () {
        Route::get('/', [Admin\ReservationsController::class, 'index'])
            ->name('admin.reservations');
        Route::get('/{reservation}', [Admin\ReservationsController::class, 'show'])
            ->name('admin.reservations.show');
        Route::put('/', [Admin\ReservationsController::class, 'updateReservationStatus'])
            ->name('admin.reservations.updateReservationStatus');
    });
    /*
     * Tables
     */
    Route::group(['prefix' => 'tables'], function () {
        Route::get('/', [Admin\TablesController::class, 'index'])
            ->name('admin.tables');
        Route::post('/create', [Admin\TablesController::class, 'create'])
            ->name('admin.tables.create');
        Route::get('/{table}', [Admin\TablesController::class, 'show'])
            ->name('admin.tables.show');
        Route::delete('/{table}', [Admin\TablesController::class, 'destroy'])
            ->name('admin.tables.destroy');
        /*
         * Table unavailable dates
         */
        Route::post('/{table}/create_unavailable_date', [Admin\TablesController::class, 'createUnavailableDate'])
            ->name('admin.tables.createUnavailableDate');
        Route::delete('/{table}/delete_unavailable_date', [Admin\TablesController::class, 'deleteUnavailableDate'])
            ->name('admin.tables.deleteUnavailableDate');
        /*
         * Table unavailable date times
         */
        Route::post('/{table}/create_unavailable_datetime', [Admin\TablesController::class, 'createUnavailableDateTime'])
            ->name('admin.tables.createUnavailableDateTime');
        Route::delete('/{table}/delete_unavailable_datetime', [Admin\TablesController::class, 'deleteUnavailableDateTime'])
            ->name('admin.tables.deleteUnavailableDateTime');
    });
    /*
     * Halls
     */
    Route::group(['prefix' => 'halls'], function () {
        Route::get('/', [Admin\HallsController::class, 'index'])
            ->name('admin.halls');
        Route::post('/create', [Admin\HallsController::class, 'create'])
            ->name('admin.halls.create');
        Route::get('/{hall}', [Admin\HallsController::class, 'show'])
            ->name('admin.halls.show');
        Route::delete('/{hall}', [Admin\HallsController::class, 'destroy'])
            ->name('admin.halls.destroy');
        /*
         * Hall unavailable dates
         */
        Route::post('/{hall}/create_unavailable_date', [Admin\HallsController::class, 'createUnavailableDate'])
            ->name('admin.halls.createUnavailableDate');
        Route::delete('/{hall}/delete_unavailable_date', [Admin\HallsController::class, 'deleteUnavailableDate'])
            ->name('admin.halls.deleteUnavailableDate');
        /*
         * Hall unavailable date times
         */
        Route::post('/{hall}/create_unavailable_datetime', [Admin\HallsController::class, 'createUnavailableDateTime'])
            ->name('admin.halls.createUnavailableDateTime');
        Route::delete('/{hall}/delete_unavailable_datetime', [Admin\HallsController::class, 'deleteUnavailableDateTime'])
            ->name('admin.halls.deleteUnavailableDateTime');
    });
});

/*
 * Auth
 */
Auth::routes();
