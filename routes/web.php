<?php

use App\Http\Controllers\LinkController;
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

Route::get('/', [LinkController::class, 'create'])->name('home');
Route::get('table', [LinkController::class, 'index'])->name('table');
Route::post('store', [LinkController::class, 'store'])->name('store');

Route::get('{link:slug}', [LinkController::class, 'redirect']);
