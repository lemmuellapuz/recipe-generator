<?php

namespace App\Http\Resources\Recipe;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailedIngredientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "amount" => $this->amount,
            "unit" => $this->unit,
            "unitLong" => $this->unitLong,
            "unitShort" => $this->unitShort,
            "aisle" => $this->aisle,
            "name" => $this->name,
            "original" => $this->original,
            "originalName" => $this->originalName,
            "meta" => $this->meta,
            "image" => $this->image
        ];
    }
}
