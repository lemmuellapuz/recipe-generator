<?php

use App\Http\Controllers\API\GenerateRecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/generate-recipe', GenerateRecipeController::class);
