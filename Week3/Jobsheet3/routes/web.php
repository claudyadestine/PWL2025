<?php     //menandakan awal dari file PHP


//mengimpor Route untuk mendefinisikan rute, data ItemController agar bisa digunakan dalam routing
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
 

Route::get('/', [HomeController::class, 'Home'])->name('Home');

use App\Http\Controllers\ProductController;

Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

use App\Http\Controllers\UserController;
Route::get('/user/{id}/name/{name}', [UserController::class, 'show']);

use App\Http\Controllers\SalesController;
Route::get('/sales', [SalesController::class, 'index']);