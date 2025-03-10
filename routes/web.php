<?php

use App\Http\Controllers\MovimientoStockController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['role:admin'])->group(function () {
    // Route::get('/admin', [AdminController::class, 'index'])->name("xd.xd");
    Route::get('/stock', [StockController::class, 'index'])->name("stocks.index");
    Route::get('/stocks/create', [StockController::class, 'create'])->name('stocks.create');
Route::post('/stocks', [StockController::class, 'store'])->name('stocks.store');

Route::get('/movimientos', [MovimientoStockController::class, 'index'])->name('movimientos.index');
Route::get('/movimientos/create', [MovimientoStockController::class, 'create'])->name('movimientos.create');
Route::post('/movimientos', [MovimientoStockController::class, 'store'])->name('movimientos.store');
Route::delete('/movimientos/{movimiento}', [MovimientoStockController::class, 'destroy'])->name('movimientos.destroy');

    
});

Route::middleware(['role:user'])->group(function () {
    
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
