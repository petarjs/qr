<?php

namespace Domain\Roles\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self admin()
 * @method static self manager()
 * @method static self operator()
 */
final class RoleEnum extends Enum {
    public static function labels()
    {
        return [
            'admin' => 'Admin',
            'manager' => 'Manager',
            'operator' => 'Operator',
        ];
    }
}
