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

Route::get('/get_listings', [App\Http\Controllers\ListingController::class, 'index']);
Route::get('show/{id}', [App\Http\Controllers\ListingController::class, 'show']);
Route::post('/search', [App\Http\Controllers\ListingController::class, 'search']);
Route::post('add_transaction', [App\Http\Controllers\ListingController::class, 'add_transaction']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
