<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SaleController::class, 'index']);
Route::get('/create_sale', [SaleController::class, 'create'])->middleware("auth");
Route::get('/edit_sale/{id}', [SaleController::class, 'edit'])->middleware("auth");

Route::post('/sale_review', [SaleController::class, 'review'])->middleware("auth");
Route::post('/edit_review', [SaleController::class, 'edit_review'])->middleware("auth");
Route::post('/finally', [SaleController::class, 'store'])->middleware("auth");

Route::delete('/delete_sale/{id}', [SaleController::class, 'destroy'])->middleware("auth");

Route::put('/update_sale/{id}', [SaleController::class, 'update'])->middleware("auth");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [SaleController::class, 'home'])->name('dashboard');
});
