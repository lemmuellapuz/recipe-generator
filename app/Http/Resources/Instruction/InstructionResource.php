<?php

namespace App\Http\Resources\Instruction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructionResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'steps' => StepResource::collection($this->steps),
        ];
    }
}
