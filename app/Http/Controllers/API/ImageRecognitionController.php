<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRecognitionRequest;
use App\Services\ImageRecognition\ImageRecognitionService;
use Illuminate\Http\Request;

class ImageRecognitionController extends Controller
{
    public function __construct(protected ImageRecognitionService $service) {}

    public function __invoke(ImageRecognitionRequest $request)
    {
        return $this->service->analyzeImage($request->image_path);
    }
}
