<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '814031489642087',
        'client_secret' => '0fb9aa27a88203c1bac1a7989df2eeea',
        'redirect' => env('APP_URL').'/auth/facebook/callback',
    ],

    'google' => [

        'client_id' => '305785322749-8pkl6acje2mvhec0ssau6qjc6p64g09h.apps.googleusercontent.com',

        'client_secret' => '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',

        'redirect' => env('APP_URL').'/auth/google/callback',
    ]

];
