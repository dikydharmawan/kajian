<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('admin_verified')) {
            return redirect('/admin/verify');
        }

        return $next($request);
    }
}
