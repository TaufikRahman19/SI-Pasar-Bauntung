<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $role)
    {
        $roles = Role::all();

        foreach ($roles as $roleFromDb) {
            if ($role == $roleFromDb->name && auth()->user()->role_id != $roleFromDb->id) {
                return abort(403);
            }
        }

        return $next($request);
    }
}
