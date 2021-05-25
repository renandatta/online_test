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
    return redirect()->route('test1');
});

Route::get('/test1', [App\Http\Controllers\HomeController::class, 'index'])->name('test1');
Route::get('/test1_array', [App\Http\Controllers\HomeController::class, 'using_array'])->name('test1_array');
Route::get('/test2', [App\Http\Controllers\HomeController::class, 'test2'])->name('test2');
