<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role =new Role();
        $role->name = 'student';
        $role->description = 'Estudiantes';
        $role->save();

        $role =new Role();
        $role->name = 'teacher';
        $role->description = 'Profesor';
        $role->save();

        $role =new Role();
        $role->name = 'admin';
        $role->description = 'Administrador';
        $role->save();

    }
}
