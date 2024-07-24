<?php
use Illuminate\Support\Facades\Route;

//ROTAS ADMIN
Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('login', [\App\Http\Controllers\Backend\AdminController::class, 'login'])->name('login');
    Route::get('forgot-password', [\App\Http\Controllers\Backend\AdminController::class, 'forgot'])->name('forgot');
    Route::get('dashboard', [\App\Http\Controllers\Backend\AdminController::class, 'dashboard'])->middleware(['auth', 'admin'])->name('dashboard');

    //ROTA ADMIN PERFIL
    Route::get('profile', [\App\Http\Controllers\Backend\ProfileController::class, 'index'])->middleware(['auth', 'admin'])->name('profile.index');
    Route::post('profile/update', [\App\Http\Controllers\Backend\ProfileController::class, 'update'])->middleware(['auth', 'admin'])->name('profile.update');
    Route::post('profile/update/password', [\App\Http\Controllers\Backend\ProfileController::class, 'updatePassword'])->middleware(['auth', 'admin'])->name('profile.update.password');

    //ROTA SLIDER DESTAQUE
    Route::resource('slider', \App\Http\Controllers\Backend\SliderController::class)->middleware(['auth', 'admin']);

    //ROTA CATEGORIAS
    Route::resource('categoria', \App\Http\Controllers\Backend\CategoriaController::class)->middleware(['auth', 'admin']);
});
