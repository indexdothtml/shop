<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Permission;

class AddSuperAdminPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'user_create',
                'display_name' => 'Создание пользователей',
                'description' => 'Создание пользователей'
            ],
            [
                'name' => 'user_update',
                'display_name' => 'Редактирование пользователей',
                'description' => 'Редактирование пользователей'
            ],
            [
                'name' => 'user_delete',
                'display_name' => 'Удаление пользователей',
                'description' => 'Удаление пользователей'
            ],
            [
                'name' => 'user_change_roles',
                'display_name' => 'Изменение ролей пользователей',
                'description' => 'Изменение ролей пользователей'
            ],
            [
                'name' => 'user_change_permissions',
                'display_name' => 'Изменение прав пользователей',
                'description' => 'Изменение прав пользователей'
            ]
        ];
        $created_permissions = [];

        foreach ($permissions as $permission) {
            $created_permissions[] = Permission::add($permission);
        }

        $role = Role::where('name', 'super_admin')->first();
        $role->attachPermissions($created_permissions);

    }
}
