<?php
namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    // Untuk shared hosting, gunakan null agar lebih aman
    protected $proxies = '*';

}
