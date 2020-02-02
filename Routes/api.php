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

// Account
Route::get('account', Account\ValidateController::class);
Route::get('validate', Account\ValidateController::class);
Route::put('account', Account\UpdateController::class);

Route::apiResource('companies', 'CompanyController');
Route::apiResource('documents', 'DocumentController');
Route::apiResource('developers', 'DeveloperController');
Route::apiResource('investors', 'InvestorController');
Route::apiResource('investments', 'InvestmentController');
Route::apiResource('investment-preferences', 'InvestmentPreferenceController');
Route::apiResource('investment-types', 'InvestmentTypeController');
Route::apiResource('investment-values', 'InvestmentValueController');
Route::apiResource('investment-views', 'InvestmentViewController');
Route::apiResource('investor-types', 'InvestorTypeController');
Route::apiResource('leads', 'LeadController');
Route::apiResource('promoters', 'PromoterController');

// Reports
Route::get('published-reports', Reports\PublishedReportController::class);
Route::apiResource('reports', 'Reports\ReportController');
