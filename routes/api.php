<?php

use App\Http\Controllers\Controller;
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


Route::post('departments',[Controller::class,'storeDepartment']);
Route::get('departments',[Controller::class,'getDepartments']);
Route::post('change-departments/{id}',[Controller::class,'changeDept']);
Route::delete('departments/{id}',[Controller::class,'deleteDept']);

Route::post('positions',[Controller::class,'storePosition']);
