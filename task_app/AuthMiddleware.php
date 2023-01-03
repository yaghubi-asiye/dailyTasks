<?php

namespace TaskApp;

use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Imanghafoori\HeyMan\Facades\HeyMan;

class AuthMiddleware
{
    public static function install($route)
    {
//        Event::listen(RouteMatched::class, function (RouteMatched $e){
//            Str::is('tasks.*', $e->route->getName() &&
//            !auth()->check()) &&
//            redirect()->guest('login')->throwResponse();
//        });

        HeyMan::onRoute($route)
            ->checkAuth()
            ->otherwise()
            ->redirect()->guest('login');

    }
}
