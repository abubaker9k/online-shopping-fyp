<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\ImageSearchController;
use App\Http\Controllers\FlaskDataController;
use App\Http\Controllers\VoiceSearchController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\blendermodelController;
use App\Http\Controllers\VisualController;
use App\Http\Controllers\BotManChatController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

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



//home page
Route::get('/', [ProductController::class,'home_view'])->name('home');


//shop page
Route::get('/shop',[ProductController::class,'view']);


Route::get('/show-model/', [ProductController::class, 'showModel'])->name('show_model');


Route::get('/speed_form', function () {
    return view('speed_form');
});


Route::get('/image-search',[ImageSearchController::class,'index']);




Route::get('/individual/{id}', [ProductController::class,'show']);
// Route::get('/cart/{id}', [ProductController::class,'show_cart']);

// Route::get('/cart', function () {
//     return view('shop/cartpage');
// });

Route::get('/shipping', function () {
    return view('shop/shipping');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/product', function () {
    return view('backend/product_add');
})->middleware(['auth', 'verified'])->name('product_add');

Route::get('/edit_video', function () {
    return view('backend/edit_video');
})->middleware(['auth', 'verified'])->name('edit_video');

Route::get('/edit_3dmodel', function () {
    return view('backend/edit_3dmodel');
})->middleware(['auth', 'verified'])->name('edit_3dmodel');



//adding the product to database
Route::post('/product', [ProductController::class,'store']);



Route::get('/shipping-confirm', function () {
    echo  'thanks for shopping';
});

Route::post('/shipping-confirm', [ShippingController::class,'store']);

Route::get('/register', function () {
    return view('auth/register');
})->middleware(['auth', 'verified'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/visual-search', [VisualController::class,'search']);



Route::post('/process', [blendermodelController::class,'process'] )->name('process');

Route::post('/process-video', [VideoController::class, 'processVideo'])->name('process-video');

Route::get('/process-video', function () {
    return view('process_video');
});




Route::get('/render-blender-video', [blendermodelController::class, 'renderBlenderVideo']);

//3D model upload
Route::post('/upload-gltf', [blendermodelController::class, 'renderBlenderVideo']);


Route::get('/run-python', [VideoController::class, 'runPythonScript']);

Route::get('/voice-search',[VoiceSearchController::class,'index']);
Route::get('/shop1', [VoiceSearchController::class, 'showTranscription']);

Route::post('/transcription', [VoiceSearchController::class, 'transcribeAudio']);

Route::get('/test',function () {
    return view('test');
});

Route::get('/view3D/{id}', [blendermodelController::class, 'show']);


Route::get('/run-blender-script' ,  [FlaskDataController::class, 'runBlenderScript']);


require __DIR__.'/auth.php';
