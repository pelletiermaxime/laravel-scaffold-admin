<?php

namespace App\Http\Middleware;

use Menu;
use Closure;

class Menu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('SidebarMenu', function ($menu) {

            $menu->add('Home', trans('menu.home'), ['route' => 'home']);
            $menu->home->add('posts', ['route' => 'posts']);

        });

        return $next($request);
    }
}
