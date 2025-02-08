<?php

namespace App\Services\ImageRecognition;

use App\Contract\ImageRecognitionInterface;
use Illuminate\Support\Facades\Http;

class GoogleVisionService implements ImageRecognitionInterface
{

    public function analyzeImage(string $imagePath): array
    {
        try {
            $imageData = base64_encode(file_get_contents($imagePath));
    
            $payload = [
                'requests' => [
                    [
                        'image' => [
                            'content' => $imageData,
                        ],
                        'features' => [
                            [
                                'type' => 'LABEL_DETECTION',
                                'maxResults' => 10,
                            ],
                        ],
                    ],
                ],
            ];
    
            $response = Http::post('https://vision.googleapis.com/v1/images:annotate?key='.config('image-recognition.api_key').'', $payload);
    
            if ($response->failed()) {
                info('API Error: ' . $response->body());
                return ['error' => 'Failed to get a successful response from the API.'];
            }
    
            $labels = $response->json()['responses'][0]['labelAnnotations'];
    
            $result = [];
            foreach ($labels as $label) {
                $result[] = $label['description'];
            }
    
            return $result;
        } catch (\Throwable $th) {
            info('Exception: ' . $th->getMessage());
            return ['error' => 'An unexpected error occurred.'];
        }
    }

}
