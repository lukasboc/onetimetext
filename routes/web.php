<?php

use App\Http\Controllers\LegalController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Secret\TextController as SecretTextController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Admin\UserController;
use Secret\TextController as TextController;

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
Route::get('/agb', [LegalController::class, 'agb']);
Route::get('/contact', [LegalController::class, 'contact']);
Route::post('/contact', [LegalController::class, 'sendMail'])->name('sendContactMessage');


Route::get('/widerruf', [LegalController::class, 'revocation']);


Route::get('/pro', [PlanController::class, 'pro']);

Route::get('/order', [PlanController::class, 'order'])->middleware(['auth']);

Route::get('/dashboard', [PlanController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/welcome', [PlanController::class, 'welcome'])->middleware(['auth'])->name('welcome');

Route::get('/whoops', [PlanController::class, 'whoops'])->middleware(['auth'])->name('whoops');

Route::get('/membership', [PlanController::class, 'membership'])->middleware(['auth', 'verified'])->name('membership');

Route::get('/billing-portal', [PlanController::class, 'billingPortal'])->middleware(['auth', 'verified'])->name('billingPortal');

Route::prefix('/')->name('text.')->group(function(){
    Route::resource('/secret', TextController::class);
});

Route::post('/delete-text', [SecretTextController::class, 'delete'])->middleware(['auth', 'verified'])->name('deleteText');

Route::get('/delete-user', [PlanController::class, 'deleteUserView'])->middleware(['auth', 'verified'])->name('deleteUserView');

Route::post('/delete-user', [PlanController::class, 'deleteUser'])->middleware(['auth', 'verified'])->name('deleteUser');
