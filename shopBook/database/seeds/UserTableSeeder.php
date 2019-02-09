<?php

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
        //
        $user = new App\User();
        $user->name = "seb";
        $user->email = "seb@gmail.com";
        $user->password = Hash::make("azertyuiop");
        $user->role_id = 2;
        $user->adresse_id = 1;
        $user->save();

        //
        $user = new App\User();
        $user->name = "toto";
        $user->email = "toto@mail.com";
        $user->password = Hash::make("azertyuiop");
        $user->role_id = 1;
        $user->adresse_id = 2;
        $user->save();
    }
}

