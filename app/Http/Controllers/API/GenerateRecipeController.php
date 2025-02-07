<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenerateRecipeRequest;
use App\Http\Resources\GeneratedRecipeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GenerateRecipeController extends Controller
{
    
    public function __invoke(GenerateRecipeRequest $request)
    {

        if(!is_array($request->ingredients)) {
            return response('Ingredients must be array', 400);
        }

        $response = Http::get('https://api.spoonacular.com/recipes/findByIngredients', [
            'apiKey' => config('spoonacular.secret_key'),
            'ingredients' => implode(',', $request->ingredients),
            'number' => 1
        ]);
        
        return GeneratedRecipeResource::collection($response->object());
    }
}
