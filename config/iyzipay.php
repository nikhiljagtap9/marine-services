<?php

return [
    'api_key'    => env('IYZIPAY_API_KEY', 'sandbox-api-key'),
    'secret_key' => env('IYZIPAY_SECRET_KEY', 'sandbox-secret-key'),
    'base_url'   => env('IYZIPAY_BASE_URL', 'https://sandbox-api.iyzipay.com'),
];
