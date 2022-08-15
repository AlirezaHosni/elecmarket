<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/get-city','/checkdonator','/sellers/check-user-pwd','/get-sellers','/check-user-pwd','/get-product','/showdonator','/ad/sellers/get-cat'
    ];
}
