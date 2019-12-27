<?php
/**
 * User: Heropoo
 * Date: 2018/1/29
 * Time: 14:14
 */

namespace App\Middleware;

use Symfony\Component\HttpFoundation\Request;
use Closure;

class Auth
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->get('username') !== 'demo' && $request->get('password') !== 'demo') {
            return redirect('login');
        }

        return $next($request);
    }
}