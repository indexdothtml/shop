<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;

class AddAdminUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Nikita Usov',
                'email' => 'nk@foxwel.com',
                'password' => bcrypt('foxwel')
            ],
            [
                'name' => 'Vladislav Kaufman',
                'email' => 'kaufman@foxwel.com',
                'password' => bcrypt('foxwel')
            ],
            [
                'name' => 'Narek Avagyan',
                'email' => 'na@foxwel.com',
                'password' => bcrypt('foxwel')
            ],
        ];

        $role = Role::where('name', 'super_user')->first();

        foreach ($users as $user) {
            $user = User::create($user);
            $user->attachRole($role);
        }
    }
}
