<?php

use App\Http\Controllers\DentistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemManageController;
use App\Http\Controllers\ServiceController;
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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [HomeController::class, 'index']);

    // services
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/edit/{id}', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/update', [ServiceController::class, 'update'])->name('services.update');
    Route::get('/services/destroy/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // dentists
    Route::get('/dentists', [DentistController::class, 'index'])->name('dentists');
    Route::post('/dentists/store', [DentistController::class, 'store'])->name('dentists.store');
    Route::get('/dentists/edit/{id}', [DentistController::class, 'edit'])->name('dentists.edit');
    Route::put('/dentists/update', [DentistController::class, 'update'])->name('dentists.update');
    Route::get('/dentists/destroy/{id}', [DentistController::class, 'destroy'])->name('dentists.destroy');

    // items
    Route::get('/items', [ItemController::class, 'index'])->name('items');
    Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/update', [ItemController::class, 'update'])->name('items.update');
    Route::get('/items/destroy/{id}', [ItemController::class, 'destroy'])->name('items.destroy');

    // categories items
    Route::get('/cat/items/', [ItemCategoryController::class, 'index'])->name('cat.items');
    Route::post('/cat/items/store', [ItemCategoryController::class, 'store'])->name('cat.items.store');
    Route::get('/cat/items/edit/{id}', [ItemCategoryController::class, 'edit'])->name('cat.items.edit');
    Route::put('/cat/items/update', [ItemCategoryController::class, 'update'])->name('cat.items.update');
    Route::get('/cat/items/destroy/{id}', [ItemCategoryController::class, 'destroy'])->name('cat.items.destroy');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// SYSTEM ROUTES
Auth::routes();
Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
