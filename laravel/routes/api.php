<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/flask-data', function () {
    $api_url = "http://127.0.0.1:5000/"; // Replace with your Flask API endpoint URL
    $data = file_get_contents($api_url);
    $data = json_decode($data, true);
    var_dump($data);
    return view('flask-data', ['data' => $data]);
});

Route::get('/flask-data', function () {
    $api_url = "http://127.0.0.1:5000/api/data"; // Replace with your Flask API endpoint URL
    $data = file_get_contents($api_url);
    $data = json_decode($data, true);

    return view('flask-data', ['data' => $data]);
});

Route::get('/t', function () {
    return 'api';
});
