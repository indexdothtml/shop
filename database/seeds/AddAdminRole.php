<?php

use Illuminate\Database\Seeder;

use \App\Models\Role;

class AddAdminRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::add([
            'name' => 'admin',
            'display_name' => 'Администратор',
            'description' => 'Администратор'
        ]);
    }
}
