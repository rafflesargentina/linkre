<?php

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

Route::apiResource('companies', 'CompanyController');
Route::apiResource('developers', 'DeveloperController');
Route::apiResource('investors', 'InvestorController');
Route::apiResource('investments', 'InvestmentController');
Route::apiResource('news', 'ArticleController');
Route::apiResource('promoters', 'PromoterController');
Route::apiResource('reports', 'ReportController');
