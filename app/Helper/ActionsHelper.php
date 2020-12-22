<?php

use Illuminate\Contracts\Translation\Translator;

if (! function_exists('dropdown_action_token')) {
    function dropdown_action_token($id, $status, $action, $route, $protected = 0)
    {
        $dropdown = '<a href="#" class="btn btn-secondary btn-rounded dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' .
            trans('global.actions') . ' <i class="ik ik-chevron-down mr-0"></i></a>' .
            '<div class="dropdown-menu">';
        // $dropdown .= show_action($route . '.show', $id);
        if ($status === 'active') {
            $dropdown .= block_action($route . '.block', $id);
        } elseif ($status === 'blocked') {
            $dropdown .= unlock_action($route . '.unblock', $id);
        }

        $dropdown .= '</div>';

        return $dropdown;
    }
}

if (! function_exists('dropdown_action')) {
    /**
     * Build Dropdown Menu for Actions
     *
     * @param $id
     * @param $status
     * @param $action
     * @param $route
     * @param int $protected
     * @return string
     */
    function dropdown_action($id, $status, $action, $route, $protected = 0)
    {
        if ($status === null || $status === '') {
            return '';
        }
        
        $dropdown = '<a href="#" class="btn btn-secondary btn-rounded dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Acciones <i class="ik ik-chevron-down mr-0"></i></a>' .
        '<div class="dropdown-menu">';
        
        $auth_id    = auth()->user()->id;

        if (have_permission('disable_'.$action,  auth()->user()->id) && $status == 'enabled') {
            $dropdown .= show_action($route . '.disable', $id, 'Deshabilitar');
        }
        
        if (have_permission('enable_'.$action,  auth()->user()->id)  && $status == 'disabled') {
            $dropdown .= show_action($route . '.enable', $id, 'Habilitar');
        }

        // IS STATUS...?
        // Yes
        if ($status === 1) {
            if (have_permission('edit_'.$action,  auth()->user()->id)) {
                $dropdown .= edit_action($route . '.edit', $id);
            }
        }
        // No
        elseif ($status === 0) {
            if (have_permission('edit_'.$action,  auth()->user()->id)) {
                $dropdown .= edit_action($route . '.edit', $id);
            }
        }
        // Active & Created
        elseif ($status === 'active' || $status === 'created' || $status === 'unprocessed') {
            if (have_permission('edit_'.$action,  auth()->user()->id)) {
                $dropdown .= edit_action($route . '.edit', $id);
            }

            if (have_permission('inactive_'.$action,  auth()->user()->id)) {
                $dropdown .= inactive_action($route . '.inactive', $id);
            }

            if ($auth_id !== $id && ! $protected && have_permission('delete_'.$action,  auth()->user()->id)) {
                $dropdown .= delete_action($route . '.destroy', $id, $action);
            }
        }
        // Inactive
        elseif ($status === 'inactive') {
            if (have_permission('active'.$action,  auth()->user()->id)) {
                $dropdown .= active_action($route . '.active', $id);
            }

            if (have_permission('delete_'.$action,  auth()->user()->id)) {
                $dropdown .= delete_action($route . '.destroy', $id, $action);
            }
        }
        // Deleted
        elseif ($status === 'deleted') {
            if (have_permission('restore_'.$action,  auth()->user()->id)) {
                $dropdown .= restore_action($route . '.restore', $id,  $action);
            }
        }

        $dropdown .= '</div>';
        return $dropdown;
    }
}

if (! function_exists('insert_action')) {
    /**
     * Create show action
     *
     * @param string $route
     * @param string|array|Translator $name
     * @return string
     */
    function insert_action(string $route, string $name = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Insertar';
        }

        return '<a href="' . route($route) . '" class="dropdown-item"><i class="ik ik-plus mr-2"></i> ' . $name . '</a>';
    }
}

if (! function_exists('show_action')) {
    /**
     * Create show action
     *
     * @param string $route
     * @param int $id
     * @param string|array|Translator $name
     * @return string
     */
    function show_action(string $route, int $id, string $name = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Mostrar';
        }

        return '<a href="' . route($route, $id) . '" class="dropdown-item" data-show="true"><i class="ik ik-eye mr-2"></i> ' . $name . '</a>';
    }
}

if (! function_exists('edit_action')) {
    /**
     * Create edit action
     *
     * @param string $route
     * @param int $id
     * @param string|array|Translator $name
     * @return string
     */
    function edit_action(string $route, int $id, string $name = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Editar';
        }

        return '<a href="#!"  onclick="$.ajaxModal(\'#modal-component\',\''.route($route,$id).'\')   " class="dropdown-item"><i class="ik ik-edit mr-2"></i> ' . $name . '</a>';
    }
}

if (! function_exists('delete_action')) {
    /**
     * Create delete action
     *
     * @param string $route
     * @param $id
     * @param string|array|Translator $name
     * @param string $block
     * @return string
     */
    function delete_action(string $route, $id, string $datatable_id, string $name = '',string $block = 'd-inline'): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Eliminar';
        }

        return '<form action="' . route($route, $id) . '" method="POST" id="form-delete-'.$id.'" data-delete="true" class="' . $block . '" onsubmit="deleteData(event, \''.route($route, $id).'\', \''.$datatable_id.'\', '.$id.')">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_method" value="delete">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<div class="dropdown-divider"></div>' .
            '<button type="submit" class="dropdown-item"><i class="ik ik-trash-2 mr-2"></i> ' . $name . '</button>' .
        '</form>';
    }
}

if (! function_exists('enable_action_bd')) {
    /**
     * Create delete action
     *
     * @param string $route
     * @param $id
     * @param string|array|Translator $name
     * @param string $block
     * @return string
     */
    function enable_action_bd(string $route, $id, string $name = '', string $block = 'd-inline'): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Eliminar';
        }

        return '<form action="' . route($route, $id) . '" method="POST" class="' . $block . '">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<div class="dropdown-divider"></div>' .
            '<button type="submit" class="dropdown-item"><i class="ik ik-trash-2 mr-2"></i> ' . $name . '</button>' .
        '</form>';
    }
}

if (! function_exists('block_action')) {
    /**
     * Create Block action
     *
     * @param string $route
     * @param $id
     * @param string $name
     * @param string $block
     * @return string
     */
    function block_action(string $route, $id, string $name = '', string $block = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Bloquear';
        }

        return '<form action="' . route($route) . '" method="POST" data-block="true" class="' . $block . '">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<button type="submit" class="dropdown-item"><i class="ik ik-lock mr-2"></i> ' . $name . '</button>' .
        '</form>';
    }
}

if (! function_exists('unlock_action')) {
    /**
     * Create unlock action
     *
     * @param string $route
     * @param $id
     * @param string|array|Translator $name
     * @param string $block
     * @return string
     */
    function unlock_action(string $route, $id, string $name = '', string $block = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Desbloquear';
        }

        return '<form action="' . route($route) . '" method="POST" data-unblock="true" class="' . $block . '">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<button type="submit" class="dropdown-item"><i class="ik ik-unlock mr-2"></i> ' . $name . '</button>' .
        '</form>';
    }
}

if (! function_exists('restore_action')) {
    /**
     * Create restore action
     *
     * @param string $route
     * @param $id
     * @param string|array|Translator $name
     * @param string $block
     * @return string
     */
    function restore_action(string $route, $id, $datatable_id,string $name = '', string $block = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Restaurar';
        }

        return '<form action="' . route($route) . '" id="form-restore-'.$id.'" method="POST" data-restore="true" class="' . $block . '" onsubmit="restoreData(event, \''.route($route, $id).'\', \''.$datatable_id.'\', '.$id.')">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<div class="dropdown-divider"></div>' .
            '<button type="submit" class="dropdown-item"><i class="ik ik-rotate-ccw mr-2"></i> ' . $name . '</button>' .
        '</form>';
    }
}

if (! function_exists('approve_action')) {
    /**
     * Create approve action
     *
     * @param string $route
     * @param string|array|Translator $name
     * @return string
     */
    function approve_action(string $route, string $name = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Aprobar';
        }

        return '<a href="' . route($route) . '" class="dropdown-item"><i class="ik ik-check-circle mr-2"></i> ' . $name . '</a>';
    }
}

if (! function_exists('active_action')) {
    /**
     * Create inactive action
     *
     * @param string $route
     * @param string|array|Translator $name
     * @return string
     */
    function active_action(string $route, string $name = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Activar';
        }

        return '<a href="' . route($route) . '" class="dropdown-item"><i class="ik ik-check-circle mr-2"></i> ' . $name . '</a>';
    }
}

if (! function_exists('inactive_action')) {
    /**
     * Create inactive action
     *
     * @param string $route
     * @param string|array|Translator $name
     * @return string
     */
    function inactive_action(string $route, string $name = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Inactivar';
        }

        return '<a href="' . route($route) . '" class="dropdown-item"><i class="ik ik-check-circle mr-2"></i> ' . $name . '</a>';
    }
}