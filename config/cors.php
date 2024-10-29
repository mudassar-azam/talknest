<?php

return [

    /*
     * Paths that are exempt from CORS checks.
     *
     * @array
     */
    'paths' => [
        public_path('api/*'),
    ],

    /*
     * Allowed origins that may make requests.
     *
     * @array
     */
    'allowed_origins' => [
        '*', // Allow requests from all origins (caution: use with care!)
        // 'https://example.com',
    ],

    /*
     * Allowed HTTP methods for API requests.
     *
     * @array
     */
    'allowed_methods' => [
        'GET',
        'POST',
        'PUT',
        'PATCH',
        'DELETE',
        'OPTIONS',
    ],

    /*
     * Allowed HTTP headers for API requests.
     *
     * @array
     */
    'allowed_headers' => [
        'Content-Type',
        'X-Auth-Token',
        'X-Requested-With',
        'Accept',
        'Authorization',
    ],

    /*
     * Maximum age (in seconds) for the preflight OPTIONS request cache.
     *
     * @int
     */
    'max_age' => 3600,

    /*
     * Expose the "public" option from the `Access-Control-Allow-Origin` header.
     *
     * @bool
     */
    'expose_headers' => [

    ],

    /*
     * Whether the allowed origins should be listed as a single string in
     * the header. When set to `false`, each origin is allowed separately.
     *
     * @bool
     */
    'supports_credentials' => false,

];
