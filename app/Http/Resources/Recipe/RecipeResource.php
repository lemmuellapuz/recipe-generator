<?php

namespace App\Http\Resources\Recipe;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'imageType' => $this->imageType,
            'usedIngredientCount' => $this->usedIngredientCount,
            'missedIngredientCount' => $this->missedIngredientCount,
            'missedIngredients' => DetailedIngredientResource::collection($this->missedIngredients),
            'usedIngredients' => DetailedIngredientResource::collection($this->usedIngredients),
            'unusedIngredients' => DetailedIngredientResource::collection($this->unusedIngredients),
            'likes' => $this->likes,
        ];
    }
}
