<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageSearchController;
use App\Http\Controllers\VoiceSearchController;
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

Route::get('/shop',[ProductController::class,'index']);
Route::get('/image-search',[ImageSearchController::class,'index']);
Route::get('/voice-search',[VoiceSearchController::class,'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/individual', function () {
    return view('shop/individual');
});

Route::get('/cart', function () {
    return view('shop/cartpage');
});

Route::get('/shipping', function () {
    return view('shop/shipping');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/product', function () {
    return view('backend/product_add');
})->middleware(['auth', 'verified'])->name('product_add');

Route::get('/register', function () {
    return view('auth/register');
})->middleware(['auth', 'verified'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
