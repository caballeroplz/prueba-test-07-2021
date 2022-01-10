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
Route::post('/address', [App\Http\Controllers\Api\Address\PostCreateAddressController::class, '__invoke']);

Route::post('/addressowner', [App\Http\Controllers\Api\Address\PostAddressOfOwnerController::class, '__invoke']);

Route::post('/company', [App\Http\Controllers\Api\Company\PostCreateCompanyController::class, '__invoke']);

Route::get('/companiesdata',[App\Http\Controllers\Api\Company\GetListAllCompanyAllDataController::class, '__invoke']);

Route::get('/companies',[App\Http\Controllers\Api\Company\GetListAllCompanyController::class, '__invoke']);

Route::post('/contact', [App\Http\Controllers\Api\Contact\PostCreateContactController::class, '__invoke']);

Route::get('/contactowner',  [App\Http\Controllers\Api\Contact\GetListAllContactController::class, '__invoke']);

Route::post('/company/enable',  [App\Http\Controllers\Api\Company\PostEnableCompanyController::class, '__invoke']);

