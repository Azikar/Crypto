<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\Assets\AssetsController;

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
Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('assets', AssetsController::class)->where(['id' => '[0-9]+']);
});

Route::fallback(function(){
    return response()->json(['message' => 'Page Not Found'], 404);
});
