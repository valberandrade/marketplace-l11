<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//CHAMANDO TODAS AS ROTAS PERSONALIZADAS
foreach (\Illuminate\Support\Facades\File::allFiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}

require __DIR__.'/auth.php';
