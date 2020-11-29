<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class GeneralAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $token = $request->header('x-api-token');

        if(!isset($token)) {
            abort(403, 'Token missing in headers!');
        }

        $user = User::where('api_token', hash('sha256', $token))
            ->whereDate('api_token_expiration', '>=', Carbon::now())
            ->first();

        if(!isset($user)) {
            abort(403, 'Wrong Credentials');
        }

        if($role === 'admin' && $user->role !== 1) {
            abort(403, 'Access only for administrator');
        }

        return $next($request);
    }
}
