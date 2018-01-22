<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

    /**
     * Create Permission
     *
     * @param array $data
     * @return Permission
     */
    public static function add(Array $data): Permission {
        try {
            $permission = Permission::create($data);
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

        return $permission;
    }

}
