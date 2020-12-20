<?php


if (! function_exists('route_exists')) {
    /**
     * Route exists (true|false)
     *
     * @param $route
     * @return bool
     */
    function route_exists($route): bool
    {
        return Route::has($route);
    }
}