<?php

namespace App\Providers;

use App\Contract\ImageRecognitionInterface;
use App\Services\ImageRecognition\GoogleVisionService;
use App\Services\ImageRecognition\HuggingFaceService;
use Illuminate\Support\ServiceProvider;

class ImageRecognitionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ImageRecognitionInterface::class, function () {
            return config('image-recognition.driver') === 'google'
                ? new GoogleVisionService()
                : new HuggingFaceService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
