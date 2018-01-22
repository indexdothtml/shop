<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddAdminRole::class);
        $this->call(AddUserRole::class);
        $this->call(AddSuperAdminRole::class);
        $this->call(AddSuperAdminPermissions::class);
        $this->call(AddAdminUsers::class);
    }
}
