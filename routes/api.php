<?php

use App\Http\Controllers\Api\v1\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function(){
    Route::apiResource('skills', SkillController::class);
});
