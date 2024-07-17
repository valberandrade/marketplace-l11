<?php
use Illuminate\Support\Facades\Route;

//ROTAS ADMIN
Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('login', [\App\Http\Controllers\Backend\AdminController::class, 'login'])->name('login');
    Route::get('forgot-password', [\App\Http\Controllers\Backend\AdminController::class, 'forgot'])->name('forgot');
    Route::get('dashboard', [\App\Http\Controllers\Backend\AdminController::class, 'dashboard'])->middleware(['auth', 'admin'])->name('dashboard');
});
