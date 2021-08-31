<?php

namespace Domain\Menus\Policies;

use Domain\Menus\Models\Menu;
use Domain\Roles\Enums\RoleEnum;
use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasRole(RoleEnum::admin()->value);
    }

    public function create(User $user)
    {
        if ($user->hasRole(RoleEnum::admin()->value)) {
            return true;
        }

        if ($user->can('manage menus')) {
            return true;
        }

        return false;
    }

    public function update(User $user, Menu $menu)
    {
        if ($user->hasRole(RoleEnum::admin()->value)) {
            return true;
        }

        if ($user->can('manage menus') && $user->company->id === $menu->company->id) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Menu $menu)
    {
        if ($user->hasRole(RoleEnum::admin()->value)) {
            return true;
        }

        if ($user->can('manage menus') && $user->company->id === $menu->company->id) {
            return true;
        }

        return false;
    }
}
