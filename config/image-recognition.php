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

    'driver' => env('IMAGE_RECOGNITION_DRIVER', 'hugging_face'),
    'access_token' => env('IMAGE_RECOGNITION_ACCESS_TOKEN', ''),
];
