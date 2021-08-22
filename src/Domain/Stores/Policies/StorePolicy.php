<?php

namespace Domain\Stores\Policies;

use Domain\Roles\Enums\RoleEnum;
use Domain\Companies\Models\Company;
use Domain\Stores\Models\Store;
use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StorePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasRole(RoleEnum::admin()->value);
    }

    public function view(User $user, Store $store)
    {
        return $user->can('view stores')
            && $user->company->id === $store->company->id;
    }

    public function create(User $user)
    {
        if ($user->hasRole(RoleEnum::admin()->value)) {
            return true;
        }

        if ($user->can('manage stores')) {
            return true;
        }

        return false;
    }

    public function update(User $user, Store $store)
    {
        if ($user->hasRole(RoleEnum::admin()->value)) {
            return true;
        }

        if ($user->can('manage stores') && $user->company->id === $store->company->id) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Store $store)
    {
        if ($user->hasRole(RoleEnum::admin()->value)) {
            return true;
        }

        if ($user->can('manage stores') && $user->company->id === $store->company->id) {
            return true;
        }

        return false;
    }
}
