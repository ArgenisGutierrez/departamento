<?php

use Illuminate\Database\Seeder;
use departamento\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role= new Role();
        $role->name="administrador";
        $role->slug="administrador";
        $role->description="todos los permisos";
        $role->nam="administrador";
        $role->save();
    }
}
