<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_padrao = Role::where('role_name','padrao')->first();
        $role_admin  = Role::where('role_name','admin')->first();

        $padrao = new User();
        $padrao->name = "User Teste";
        $padrao->email = "cpd@centrallogistica.com.br";
        $padrao->password = bcrypt("1010");
        $padrao->save();
        $padrao->roles()->attach($role_padrao);
        
        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "web@centrallogistica.com.br";
        $admin->password = bcrypt("1010");
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
