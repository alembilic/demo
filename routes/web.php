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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/locations', [\App\Http\Controllers\LocationController::class, 'index'])->name('locations');
    Route::get('/locations/create', [\App\Http\Controllers\LocationController::class, 'create'])->name('locations.create');
    Route::post('/locations/store', [\App\Http\Controllers\LocationController::class, 'store'])->name('locations.store');
    Route::get('/offices', [\App\Http\Controllers\OfficeController::class, 'index'])->name('offices');
    Route::get('/offices/create', [\App\Http\Controllers\OfficeController::class, 'create'])->name('offices.create');
    Route::post('/offices/store', [\App\Http\Controllers\OfficeController::class, 'store'])->name('offices.store');
});

require __DIR__.'/auth.php';
