<?php
use Illuminate\Support\Facades\Route;

//ROTAS VENDEDOR
Route::prefix('vendor')->name('vendor.')->group(function (){
    Route::get('dashboard', [\App\Http\Controllers\Backend\VendorController::class, 'dashboard'])->middleware(['auth', 'vendor'])->name('dashboard');
});
