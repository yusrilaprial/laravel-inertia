<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;

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
    // return view('welcome');
    return redirect('/home');
});

Route::get('/home', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);

Route::get('/users', [UserController::class, 'index'])->name('user.index');

Route::get('/register', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/{user}', [UserController::class, 'show']);

Route::get('/user/{user}/edit', [UserController::class, 'edit']);
Route::put('/user/{user}', [UserController::class, 'update']);

Route::delete('/user/{id}', [UserController::class, 'destroy']);
