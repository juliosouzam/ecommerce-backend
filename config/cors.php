<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => false,
    'allowedOrigins' => ['http://localhost:8080'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['Content-Type', 'X-Requested-With'],
    'allowedMethods' => ['GET', 'POST'],
    'exposedHeaders' => [],
    'maxAge' => 0,
];
