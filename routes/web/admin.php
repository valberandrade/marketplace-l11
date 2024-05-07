<?php
use Illuminate\Support\Facades\Route;

//ROTAS ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function (){
    Route::get('dashboard', [\App\Http\Controllers\Backend\AdminController::class, 'dashboard'])->name('dashboard');

    //ROTA ADMIN PERFIL
    Route::get('profile', [\App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('profile');
    Route::patch('profile/update', [\App\Http\Controllers\Backend\ProfileController::class, 'update'])->name('profile.update');
    Route::patch('profile/update/password', [\App\Http\Controllers\Backend\ProfileController::class, 'updatePassword'])->name('profile.password');

    //ROTA ADMIN SLIDES
    Route::resource('slider', \App\Http\Controllers\Backend\SlideController::class);
});

//ROTA ADMIN LOGIN
Route::get('admin/login', [\App\Http\Controllers\Backend\AdminController::class, 'login'])->name('admin.login');
Route::get('admin/forgot-password', [\App\Http\Controllers\Backend\AdminController::class, 'forgot'])->name('admin.forgot');
