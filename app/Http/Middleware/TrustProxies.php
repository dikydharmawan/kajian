<?php
namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    // Untuk shared hosting, gunakan null agar lebih aman
    protected $proxies = null;

    // Laravel 12 handles headers automatically, no need to specify $headers
}
