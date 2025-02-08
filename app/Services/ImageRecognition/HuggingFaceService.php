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
        $this->apiKey = config('image-recognition.api_key');
        $this->modelUrl = 'https://api-inference.huggingface.co/models/nateraw/food';
    }

    public function analyzeImage(string $imagePath): array
    {
        try {
            $imageData = file_get_contents($imagePath);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type'  => 'application/octet-stream',
            ])->post($this->modelUrl, $imageData);

            if($response->failed()) {
                info('API Error: ' . $response->body());
                return ['error' => 'Failed to get a successful response from the API.'];
            }

            return json_decode($response->body(), true);
            
        } catch (\Throwable $th) {
            info('Exception: ' . $th->getMessage());
            return ['error' => 'An unexpected error occurred.'];
        }
    }

}
