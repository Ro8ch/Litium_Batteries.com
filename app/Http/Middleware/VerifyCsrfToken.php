<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [

        /**[

            'testing' => true, // Set to false when in production.
        
            'currency' => 'ZAR', // ZAR is the only supported currency at this point.
        
            'merchant' => [
                'merchant_id' => env('PF_MERCHANT_ID', '10000100'), // TEST Credentials. Replace with your merchant ID from Payfast.
                'merchant_key' => env('PF_MERCHANT_KEY', '46f0cd694581a'), // TEST Credentials. Replace with your merchant key from Payfast.
                'return_url' => env('PF_RETURN_URL', 'http://your-domain.co.za/success'), // Redirect URL on Success.
                'cancel_url' => env('PF_CANCEL_URL', 'http://your-domain.co.za/cancel'), // Redirect URL on Cancellation.
                'notify_url' => env('PF_ITN_URL', 'http://your-domain.co.za/itn'), // ITN URL.
            ],
        
        ];
        
            'merchant' => [
                'merchant_id' => env(PF_MERCHANT_ID), // TEST Credentials. Replace with your merchant ID from Payfast.
                'merchant_key' => env(PF_MERCHANT_KEY), // TEST Credentials. Replace with your merchant key from Payfast.
                'return_url' => env(PF_RETURN_URL), // Redirect URL on Success.
                'cancel_url' => env(PF_CANCEL_URL), // Redirect URL on Cancellation.
                'notify_url' => env(PF_ITN_URL), // ITN URL.
            ], */
    ];

}
