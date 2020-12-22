<?php

if (! function_exists('viewExist')) {
    /**
     * Detect if view file exists
     *
     * @param string $name
     * @return bool
     */
    function viewExist(string $name = ''): bool
    {
        if (! view()->exists($name)) {
            abort(404,'Vista no existe');
        }

        return true;
    }
}
