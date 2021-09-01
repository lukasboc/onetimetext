<?php

use App\Http\Controllers\LegalController;
use Illuminate\Support\Facades\Route;
use Admin\UserController;
use Secret\TextController;

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
    return view('index');
});

Route::get('/impressum', [LegalController::class, 'imprint']);
Route::get('/datenschutz', [LegalController::class, 'privacyPolicy']);


Route::prefix('/')->name('text.')->group(function(){
    Route::resource('/secret', TextController::class);
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin', 'verified'])->name('admin.')->group(function(){
    Route::resource('/users', UserController::class);
});
