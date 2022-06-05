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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('create_campaign', 'App\Http\Controllers\APICampaignsControllerr@create_campaign');
Route::get('view_campaign', 'App\Http\Controllers\APICampaignsControllerr@view_campaign');
Route::post('update_campaign', 'App\Http\Controllers\APICampaignsControllerr@update_campaign');
Route::post('delete_campaign', 'App\Http\Controllers\APICampaignsControllerr@delete_campaign');