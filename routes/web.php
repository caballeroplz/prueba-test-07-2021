<?php

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

Route::get('/', function () {
    return 'Hola mundo!! ❤️';
});

//Route::resource('address', App\Http\Controllers\Api\Address\PostCreateAddressController::class);
//Route::get('addressowner', App\Http\Controllers\Api\Address\GetAddressOfOwnerController::class);