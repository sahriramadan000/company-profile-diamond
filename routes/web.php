<?php

use App\Http\Controllers\Admin\GoldPriceController;
use App\Http\Controllers\Admin\ImportantNoteController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

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

// ============================================================
// Front Web
// ============================================================
Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::prefix('admin/v1')->group(function () {
    Route::get('/access', [GoldPriceController::class, 'index'])->name('admin');
    Route::post('/access/store', [GoldPriceController::class, 'store'])->name('admin.update_gold_prices');
    Route::post('/access/important-note', [ImportantNoteController::class, 'store'])->name('admin.update_important_note');
    Route::post('/access/setting', [SettingController::class, 'createOrUpdate'])
        ->name('admin.update_setting');
});
