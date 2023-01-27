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
Route::redirect('/', '/reservation');
Route::get('/reservation', ReservationForm::class)->name('livewire.reservation');
Route::view('/reservation/success', 'reservation_success')->name('reservation.success');
Route::view('/private_policy', 'private_policy')->name('privatePolicy');

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
     * Vyrtrenass
     */
    Route::group(['prefix' => 'vyrtrenass'], function () {
        Route::get('/', [Admin\VyrtrenassController::class, 'index'])
            ->name('admin.vyrtrenasss');
        Route::post('/create', [Admin\VyrtrenassController::class, 'create'])
            ->name('admin.vyrtrenasss.create');
        Route::get('/{vyrtrenass}', [Admin\VyrtrenassController::class, 'show'])
            ->name('admin.vyrtrenasss.show');
        Route::delete('/{vyrtrenass}', [Admin\VyrtrenassController::class, 'destroy'])
            ->name('admin.vyrtrenasss.destroy');
        /*
         * Vyrtrenass unavailable dates
         */
        Route::post('/{vyrtrenass}/create_unavailable_date', [Admin\VyrtrenassController::class, 'createUnavailableDate'])
            ->name('admin.vyrtrenasss.createUnavailableDate');
        Route::delete('/{vyrtrenass}/delete_unavailable_date', [Admin\VyrtrenassController::class, 'deleteUnavailableDate'])
            ->name('admin.vyrtrenasss.deleteUnavailableDate');
        /*
         * Vyrtrenass unavailable date times
         */
        Route::post('/{vyrtrenass}/create_unavailable_datetime', [Admin\VyrtrenassController::class, 'createUnavailableDateTime'])
            ->name('admin.vyrtrenasss.createUnavailableDateTime');
        Route::delete('/{vyrtrenass}/delete_unavailable_datetime', [Admin\VyrtrenassController::class, 'deleteUnavailableDateTime'])
            ->name('admin.vyrtrenasss.deleteUnavailableDateTime');
    });

    Route::group(['prefix' => 'vyrtrens'], function () {
        Route::get('/', [Admin\VyrtrenController::class, 'index'])
            ->name('admin.vyrtrens');
        Route::post('/create', [Admin\VyrtrenController::class, 'create'])
            ->name('admin.vyrtrens.create');
        Route::get('/{vyrtren}', [Admin\VyrtrenController::class, 'show'])
            ->name('admin.vyrtrens.show');
        Route::delete('/{vyrtren}', [Admin\VyrtrenController::class, 'destroy'])
            ->name('admin.vyrtrens.destroy');
        /*
         * Vytren unavailable dates
         */
        Route::post('/{vyrtren}/create_unavailable_date', [Admin\VyrtrenController::class, 'createUnavailableDate'])
            ->name('admin.vyrtrens.createUnavailableDate');
        Route::delete('/{vyrtren}/delete_unavailable_date', [Admin\VyrtrenController::class, 'deleteUnavailableDate'])
            ->name('admin.vyrtrens.deleteUnavailableDate');
        /*
         * Vyrtren unavailable date times
         */
        Route::post('/{vyrtren}/create_unavailable_datetime', [Admin\VyrtrenController::class, 'createUnavailableDateTime'])
            ->name('admin.vyrtrens.createUnavailableDateTime');
        Route::delete('/{vyrtren}/delete_unavailable_datetime', [Admin\VyrtrenController::class, 'deleteUnavailableDateTime'])
            ->name('admin.vyrtrens.deleteUnavailableDateTime');
    });
    /*
     * fiztren
     */
    Route::group(['prefix' => 'fiztren'], function () {
        Route::get('/', [Admin\FiztrenController::class, 'index'])
            ->name('admin.fiztren');
        Route::post('/create', [Admin\FiztrenController::class, 'create'])
            ->name('admin.fiztren.create');
        Route::get('/{fiztren}', [Admin\FiztrenController::class, 'show'])
            ->name('admin.fiztren.show');
        Route::delete('/{fiztren}', [Admin\FiztrenController::class, 'destroy'])
            ->name('admin.fiztren.destroy');
        /*
         * fiztren unavailable dates
         */
        Route::post('/{fiztren}/create_unavailable_date', [Admin\FiztrenController::class, 'createUnavailableDate'])
            ->name('admin.fiztren.createUnavailableDate');
        Route::delete('/{fiztren}/delete_unavailable_date', [Admin\FiztrenController::class, 'deleteUnavailableDate'])
            ->name('admin.fiztren.deleteUnavailableDate');
        /*
         * fiztren unavailable date times
         */
        Route::post('/{fiztren}/create_unavailable_datetime', [Admin\FiztrenController::class, 'createUnavailableDateTime'])
            ->name('admin.fiztren.createUnavailableDateTime');
        Route::delete('/{fiztren}/delete_unavailable_datetime', [Admin\FiztrenController::class, 'deleteUnavailableDateTime'])
            ->name('admin.fiztren.deleteUnavailableDateTime');
    });
});

/*
 * Auth
 */
Auth::routes();
