<?php

use Illuminate\Database\Seeder;
use departamento\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name="Argenis Gutierrez";
        $user->email="argenis.v.ballard@gmail.com";
        $user->password=bcrypt('argenis17121995');
        $user->save();
    }
}
