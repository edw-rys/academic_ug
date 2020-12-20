
<?php

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;



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