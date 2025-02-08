<?php

namespace App\Providers;

use App\Contract\ImageRecognitionInterface;
use App\Services\ImageRecognition\HuggingFaceService;
use Illuminate\Support\ServiceProvider;

class ImageRecognitionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ImageRecognitionInterface::class, function(){

            $service = config('image-recognition.driver');

            if($service === 'hugging_face'){
                return new HuggingFaceService();
            }
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
