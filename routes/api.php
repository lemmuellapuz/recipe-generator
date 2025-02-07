<?php

use App\Http\Controllers\API\GenerateRecipeController;
use App\Http\Controllers\API\InstructionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/generate-recipe', GenerateRecipeController::class);
Route::get('/show-instructions/{id}', InstructionController::class);
