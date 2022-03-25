<?php
use App\Http\Controllers\{HomeController, UserController};
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

Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home'); // Home
Route::get('/home', [HomeController::class, 'index'])->name('home'); // Home
Route::get('users', [UserController::class, 'index'])->name('users'); // User List
Route::get('profile/{id}', [UserController::class, 'profile'])->name('profile');

