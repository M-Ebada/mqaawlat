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
    'google_map' => [
        'api_key' => env('GOOGLE_API_KEY', "AIzaSyCIbcdp1vb3b4g3nebCQrvUmxA-SMuC47Y"),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    "enable_random_code" => env("ENABLE_RANDOM_CODE", false),

    'apple' => [
        'client_id' => env('APPLE_CLIENT_ID'),
        'client_secret' => env('APPLE_CLIENT_SECRET'),
        'redirect' => env('APPLE_REDIRECT_URI')
    ],

    'paymob' => [
        'apiKey' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2T1RFMU9UUXpMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkuYWtJVlJxZHhYQ3k5b2h1cUpadFp4TXJ3elp3Z0c4SHJzak43V0tUajlHRHNqYUppZHZOd2JZaTlyaTJXZTRwSGJ6d3VoMHgzdzdicGhhbElDQmpnUnc=',
        'secKey' => 'egy_sk_test_98a558ea27e4db689633dfe5c2ca050d6562f20a64f64ebcd06d53291d1b9001',
        'pubKey' => 'egy_pk_test_pJCB8sN34Ff1WAGuwztpv3Bq1H0l7kaq',
        'keys'  => '5275667,5275666,5275665'
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT_URI')
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URL')
    ],

];
