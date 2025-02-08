<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRecognitionRequest;
use App\Services\ImageRecognition\ImageRecognitionService;
use Illuminate\Http\Request;

class ImageRecognitionController extends Controller
{

    public function __invoke(ImageRecognitionRequest $request, ImageRecognitionService $service)
    {
        $response = $service->analyzeImage($request->image_path);

        if (isset($response['error'])) {
            return response()->json($response, 500);
        }

        return response()->json($response);
    }
}
