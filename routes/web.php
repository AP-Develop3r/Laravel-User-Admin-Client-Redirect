<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'client','prefix' => '/'], function () {
    Route::get('index', [ClientController::class, 'index'])   ->name('client.index');

 });
 Route::group(['middleware' => 'admin','prefix' => '/admin'], function () {
    Route::get('', [AdminController::class, 'index'])   ->name('admin.index');

 });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
