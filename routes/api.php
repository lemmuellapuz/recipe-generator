<?php

use App\Http\Controllers\API\RecipeController;
use App\Http\Controllers\API\InstructionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/generate-recipe', RecipeController::class);
Route::get('/show-instructions/{id}', InstructionController::class);