<?php

return [
    // test or production
    //'mode' => env('URWAY_MODE', 'test'),

    'auth' => [
        'mode'  => env('URWAY_MODE'),
        'terminal_id' => env('URWAY_TERMINAL_ID'),
        'password' => env('URWAY_PASSWORD'),
        'merchant_key' => env('URWAY_MERCHANT_KEY'),
    ],
];
