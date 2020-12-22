<?php
use Illuminate\Support\Facades\Gate;


if (! function_exists('canAccessTo')) {
    /**
     * Can Access To
     *
     * @param $permission
     * @return void
     */
    function canAccessTo($permission): void
    {
        if (!have_permission($permission,  auth()->user()->id)) {
            abort(403, 'Permisos denegados');
        }
    }
}