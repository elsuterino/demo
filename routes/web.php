<?php

use App\Http\Controllers\TinyUrlController;
use Illuminate\Support\Facades\Route;

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

Route::post('/url', [TinyUrlController::class, 'store'])->name('tiny-url.store');
Route::get('/url/{url:slug}', [TinyUrlController::class, 'show'])->name('tiny-url.show');
Route::delete('/url/{url:slug}', [TinyUrlController::class, 'destroy'])->name('tiny-url.destroy');
