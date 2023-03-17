<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//inventory
Route::get('/inventori/create', [App\Http\Controllers\InventoryController::class, 'create'])->name('inventori.create');
Route::post('/inventori/store', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventori.store');
Route::get('/inventori/edit/{inventory}', [App\Http\Controllers\InventoryController::class, 'edit'])->name('inventori.edit');
Route::post('/inventori/update/{inventory}', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventori.update');
Route::get('/inventori/delete/{inventory}', [App\Http\Controllers\InventoryController::class, 'delete'])->name('inventori.delete');
Route::get('/inventori/search', [App\Http\Controllers\InventoryController::class, 'search'])->name('inventori.search');

