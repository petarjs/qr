<?php

namespace Domain\Companies\Policies;

use Domain\Roles\Enums\RoleEnum;
use Domain\Companies\Models\Company;
use Domain\Stores\Models\Store;
use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasRole(RoleEnum::admin()->value);
    }

    public function view(User $user, Company $company)
    {
        return $user->can('manage company')
            && $user->company->id === $company->id;
    }
}
