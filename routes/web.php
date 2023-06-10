<?php

namespace App\Http\Controllers\Controllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\RegisterController;

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
    return view('welcome');
})->middleware(['maintenance']);

Route::resource('Login', LoginController::class);
Route::resource('register', RegisterController::class);
Route::get('/ShowAccount',[RegisterController::class, 'ShowAccount']);
Route::get('/SessionUserAccounts', [LoginController::class, 'SessionUserAccounts']);

Route::resource('client', ClientsController::class)->middleware(['SessionUserAccounts']);
Route::get('maintenance', [PagesController::class, 'maintenance']);
Route::post('logout',  [ClientsController::class, 'logout'])->name('logout');




