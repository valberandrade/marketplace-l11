<?php
use Illuminate\Support\Facades\Route;

//ROTAS VENDEDOR
Route::prefix('vendor')->middleware(['auth', 'vendor'])->name('vendor.')->group(function (){
    Route::get('dashboard', [\App\Http\Controllers\Backend\VendorController::class, 'dashboard'])->name('dashboard');
});
