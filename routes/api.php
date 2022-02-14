<?php

use App\Http\Controllers\ShipController;
use Illuminate\Support\Facades\Route;



//Route::group(['middleware'=>'auth:sanctum'], function(){
//    Route::get('/ships', [ShipController::class, 'all']);
//    Route::get('/ships/{id}', [ShipController::class, 'view']);
//    Route::post('/ships', [ShipController::class, 'store']);
//    Route::patch('/ships/{id}', [ShipController::class, 'update']);
//    Route::delete('/ships/{id}',[ShipController::class, 'delete'] );
//});

Route::get('/ships', [ShipController::class, 'all']);
Route::get('/ships/{id}', [ShipController::class, 'view']);
Route::post('/ships', [ShipController::class, 'store']);
Route::patch('/ships/{id}', [ShipController::class, 'update']);
Route::delete('/ships/{id}',[ShipController::class, 'delete'] );
