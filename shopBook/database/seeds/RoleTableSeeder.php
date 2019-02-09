<?php

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
        //
        $role = new App\Roles();
        $role->nom = "Admin";
        $role->description = "Admin";
        $role->save();

        $role = new App\Roles();
        $role->nom = "Client";
        $role->description = "Client";
        $role->save();
    }


}
