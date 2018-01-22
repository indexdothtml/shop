<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class AddUserRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::add([
            'name' => 'user',
            'display_name' => 'Пользователь',
            'description' => 'Пользователь'
        ]);
    }
}
