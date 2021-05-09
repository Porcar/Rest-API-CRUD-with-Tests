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
    return view('welcome');
});

//Those routes are for the WEB views. NOT used in this version.
//Route::resource('apartment','App\Http\Controllers\ApartmentController');
//Route::resource('category','App\Http\Controllers\ApartmentCategoryController');

