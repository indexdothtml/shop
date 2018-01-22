<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class AddSuperAdminRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::add([
            'name' => 'super_admin',
            'display_name' => 'Super Admin',
            'description' => 'Super Admin'
        ]);
    }
}
