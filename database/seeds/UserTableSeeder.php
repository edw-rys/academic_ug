<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','admin')->first();
        $role_teacher = Role::where('name','teacher')->first();
        $role_student = Role::where('name','student')->first();
        //select * from roles where name='student';
        $user = new User();
        $user->name ='Edw';
        $user->last_name ='Rys';
        $user->email ='edw@edw.com';
        $user->password = bcrypt('edw');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name ='Student';
        $user->last_name ='Student';
        $user->email ='student@student.com';
        $user->password = bcrypt('rdit');
        $user->save();
        $user->roles()->attach($role_student);

        $user = new User();
        $user->name ='Roberth';
        $user->last_name ='Idrovo';
        $user->email ='rdit@rdit.com';
        $user->password = bcrypt('rdit');
        $user->save();
        $user->roles()->attach($role_student);
    }
}
