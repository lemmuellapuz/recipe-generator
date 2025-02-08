<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Recognition
    |--------------------------------------------------------------------------
    |
    | This file is for storing the configuration of image recognition
    |
    */
    
    'driver' => env('IMAGE_RECOGNITION_DRIVER', 'google'),
    'api_key' => env('IMAGE_RECOGNITION_API_KEY', ''),
    
];
