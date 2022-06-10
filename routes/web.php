<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\ReservationForm;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/reservation', ReservationForm::class)->name('livewire.reservation');
Route::view('/reservation/saved', 'reservation_saved')->name('reservation.saved');

/*
 * Admin
 */
Route::group(['prefix' => 'admin', 'middleware' => ['admin.authorization']], function () {
    Route::get('/', [Admin\HomeController::class, 'index'])->name('admin.home');
});

/*
 * Other
 */
Auth::routes();
