<?php

namespace App\Contract;

use Illuminate\Http\Client\Response;

interface ImageRecognitionInterface
{
    public function analyzeImage(string $imagePath) : Response;
}
