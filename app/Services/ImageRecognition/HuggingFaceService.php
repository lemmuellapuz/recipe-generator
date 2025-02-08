<?php

namespace App\Services\ImageRecognition;

use App\Contract\ImageRecognitionInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class HuggingFaceService implements ImageRecognitionInterface
{

    protected $apiKey;
    protected $modelUrl;

    public function __construct()
    {
        $this->apiKey = config('image-recognition.access_token');
        $this->modelUrl = 'https://api-inference.huggingface.co/models/nateraw/food';
    }

    public function analyzeImage(string $imagePath): Response
    {
        $imageData = file_get_contents($imagePath);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type'  => 'application/octet-stream',
        ])->post($this->modelUrl, $imageData);

        return $response->object();
    }

}