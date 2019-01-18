<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(
    function () {
        Route::apiResource('developer', 'DeveloperController');
        Route::apiResource('investments', 'InvestmentController');
        Route::apiResource('investors', 'InvestorController');
    }
);
