<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeRequest;
use App\Http\Resources\Recipe\RecipeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
    
    public function __invoke(RecipeRequest $request)
    {

        if(!is_array($request->ingredients)) {
            return response('Ingredients must be array', 400);
        }

        $response = Http::get('https://api.spoonacular.com/recipes/findByIngredients', [
            'apiKey' => config('spoonacular.secret_key'),
            'ingredients' => implode(',', $request->ingredients),
            'number' => 10
        ]);
        
        return RecipeResource::collection($response->object());
    }
}
