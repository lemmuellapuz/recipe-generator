<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneratedRecipeResource extends JsonResource
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
            'missedIngredients' => IngredientResource::collection($this->missedIngredients),
            'usedIngredients' => IngredientResource::collection($this->usedIngredients),
            'unusedIngredients' => IngredientResource::collection($this->unusedIngredients),
            'likes' => $this->likes,
        ];
    }
}
