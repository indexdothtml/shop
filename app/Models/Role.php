<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    /**
     * Create Role
     *
     * @param array $data
     * @return Role
     */
    public static function add(Array $data): Role {
        try {
            $role = Role::create($data);
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

        return $role;
    }

}
