<?php
use Illuminate\Support\Facades\Route;

//ROTAS ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function (){
    Route::get('dashboard', [\App\Http\Controllers\Backend\AdminController::class, 'dashboard'])->name('dashboard');
});
