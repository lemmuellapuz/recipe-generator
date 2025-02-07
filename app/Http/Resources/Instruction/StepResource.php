<?php

namespace App\Http\Resources\Instruction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StepResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'equipment' => EquipmentResource::collection($this->equipment),
            'ingredients' => IngredientResource::collection($this->ingredients),
            'number' => $this->number,
            'step' => $this->step,
        ];
    }
}
