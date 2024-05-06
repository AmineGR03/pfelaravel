<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return redirect()->route('admin.products');
});

Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');
Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');


Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

