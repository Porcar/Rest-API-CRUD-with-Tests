<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use App\Http\Controllers\ApartmentController;

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

Route::apiResource('apartment','App\Http\Controllers\ApartmentController');
Route::get('/apartment', function(){
    return new ApartmentResource(Apartment::paginate(10));
});
