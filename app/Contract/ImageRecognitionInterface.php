<?php

namespace App\Contract;

interface ImageRecognitionInterface
{
    public function analyzeImage(string $imagePath) : array;
}
