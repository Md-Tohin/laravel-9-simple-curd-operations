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


Route::get('/', [UserController::class, 'index']);

Route::get('users/{id}/delete', [UserController::class, 'destroy']);
Route::get('user/{id}/inactive', [UserController::class, 'inactive']);
Route::get('user/{id}/active', [UserController::class, 'active']);
Route::resource('/users', UserController::class);
