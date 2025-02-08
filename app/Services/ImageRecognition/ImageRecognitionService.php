<?php

namespace App\Services\ImageRecognition;

use App\Contract\ImageRecognitionInterface;
use Illuminate\Support\Facades\Http;

class ImageRecognitionService
{

    public function __construct(protected ImageRecognitionInterface $interface) {}

    public function analyzeImage(string $imagePath)
    {
        return $this->interface->analyzeImage($imagePath);
    }
    
}
