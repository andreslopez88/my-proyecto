<?php

use App\Http\Controllers\Api\resgistroControllers;
use App\Http\Controllers\Api\categoriesControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/prueba', function(){
    return 'hola';
});

Route::post('register', [resgistroControllers::class, 'store'])->name('api.v1.register');
Route::post('categories', [categoriesControllers::class, 'store'])->name('api.v1.categories');
