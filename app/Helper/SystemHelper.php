<?php
use \Illuminate\Support\Facades\Route;


if (! function_exists('titleView')) {
    /**
     * Get Title view
     *
     * @return string
     */
    function titleView(): string
    {
        $route = Route::getCurrentRoute()->getName() ;
        $routeList = explode('.', $route);
        if(count($routeList) > 2){
            return config('app_academic.views_title.'.$routeList[1]) ?? $routeList[1] ;
        }
        return $route; 
    }
}


