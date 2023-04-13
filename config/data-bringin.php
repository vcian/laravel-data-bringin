<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Data Bringin Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where data bringin will be accessible from.
    | You change this path to anything you like.
    |
    */

    'path' => env('DATA_BRINGIN_PATH', 'data-bringin'),

    /*
    |--------------------------------------------------------------------------
    | Data Bringin Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Data Bringin route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => [
        'web',
    ],
];
