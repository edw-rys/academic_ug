
<?php

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Permission;



if (! function_exists('getIdByRole')) {
    /**
     * Generate Date Range
     *
     * @param $data  => formart d/m/Y
     * @return string
     */
    function getIdByRole($data )
    {
        if($data === null){
            return [];
        }
        $data = (object) $data;
        return $data->user_id;
    }
}

if (! function_exists('getUsersByRole')) {
    /**
     *
     * @param $role
     * @return mixed
     */
    function getUsersByRole($role ) 
    {
        //$role = Role::all();
        $role = Role::where('name', $role)->first();//->get() obtengo datos (Execute)
        if($role === null){
            // Get role 
            return null;
        }
        $usersRole = RoleUser::where('role_id', $role->id)->get();
        if($usersRole !== null){
            $data = array_map('getIdByRole', $usersRole->toArray());
          
            return User::whereIn('id', $data);

        }
        return null;
    }
}

if (!function_exists('have_permission')) {
    /**
     * Make Scripts
     *
     * @param $permission_system
     * @param $user_id
     * @return bool
     */
    function have_permission($permission_system, $user_id): bool
    {
        // Get roles
        $roles = RoleUser::where('user_id', $user_id)->get();
        if (empty($roles)) {
            return false;
        }

        // Have permissions
        foreach ($roles as $key => $rol) {
            $permission = Permission::
                join('role_has_permissions', 'role_has_permissions.permission_id', 'permissions.id')
                ->where('name', '=', $permission_system)
                ->where('role_has_permissions.role_id', '=', $rol->role_id)
                ->first();
            if ($permission !== null) {
                return true;
            }
        }

        return false;
    }
}
