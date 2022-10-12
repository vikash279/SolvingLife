<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Admin Routes
Route::get('/index',[UserController::class, 'index'])->name('index');
Route::get('/allusers',[UserController::class, 'allUsers'])->name('allusers');
Route::get('/addusers',[UserController::class, 'addUsers'])->name('addusers');
