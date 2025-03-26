<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\Admin\LaundriesController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/laundries', [LaundriesController::class, 'index'])->name('laundries');
    Route::post('/laundries/{id}/update-status', [LaundriesController::class, 'updateStatus'])->name('laundries.update-status');
});

Route::middleware('auth')->group(function () {
    
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('laundry')->name('laundry.')->group(function () {
        // apply for laundry
        Route::get('/create', [LaundryController::class, 'create'])->name('create');
        Route::post('/store', [LaundryController::class, 'store'])->name('store');
        Route::get('/{id}/show', [LaundryController::class, 'show'])->name('show');

        // receive laundry
        Route::get('/pickup', [LaundryController::class, 'pickup'])->name('pickup');
        Route::post('/pickup', [LaundryController::class, 'processPickup'])->name('pickup.process');

    });
});

require __DIR__.'/auth.php';
