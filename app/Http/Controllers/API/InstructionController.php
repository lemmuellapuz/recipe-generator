<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstructionRequest;
use App\Http\Resources\InstructionResource;
use Illuminate\Support\Facades\Http;

class InstructionController extends Controller
{
    /**
     * Shows the instruction for the recipe
    */
    public function __invoke(int $id)
    {

        if(!$id) {
            return response('Recipe not found', 404);
        }

        $response = Http::get('https://api.spoonacular.com/recipes/324694/analyzedInstructions', [
            'apiKey' => config('spoonacular.secret_key'),
            'id' => $id,
        ]);
        
        return InstructionResource::collection($response->object());
    }
}
