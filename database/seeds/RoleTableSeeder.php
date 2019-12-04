<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_padrao = new Role();
        $role_padrao->role_name = "padrao";
        $role_padrao->role_descri = "Usuario Padrao";
        $role_padrao->save();

        $role_admin = new Role();
        $role_admin->role_name = "admin";
        $role_admin->role_descri = "Usuario Administrador";
        $role_admin->save();

    }

}
