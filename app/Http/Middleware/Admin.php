<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Admin
{
     public function handle($request, Closure $next) {
        $route = Route::getRoutes()->match($request);
		$current_route = $route->getName();
        // if (strpos($current_route, 'create') !== false) {
        //     $parent_route = str_replace('create', 'index', $current_route);
        //     $method = 'create';
        // } elseif (strpos($current_route, 'edit') !== false) {
        //     $parent_route = str_replace('edit', 'index', $current_route);
        //     $method = 'edit';
        // } else {
        //     $parent_route = null;
        //     $method = 'index';
        // }

        if (Auth::check() != false) {
                if (Auth::user()->role_id <> \App\Models\User::ROLE_ADMINISTRATOR) {
                    if (!in_array($current_route, Auth::user()->role->route())) {
                        abort(403);
                    }
                }
                // if ($parent_route == null) {
                //     $parent_route = $current_route;
                // }
                // $config = \DB::table('config')->where('id', 1)->first();
                // \View::share(['current_route' => $current_route, 'parent_route' => $parent_route, 'method' => $method, 'config' => $config]);
                return $next($request);

        } else {
            return redirect()->route('login');
        }
    }
}
