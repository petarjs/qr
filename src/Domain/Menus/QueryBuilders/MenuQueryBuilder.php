<?php

namespace Domain\Menus\QueryBuilders;

use Domain\Companies\Models\Company;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Builder;

class MenuQueryBuilder extends Builder
{
    public function forUser(User $user)
    {
        $company = $user->company;
        return $this->whereCompanyId($company->id);
    }
}
