<?php

namespace Domain\Stores\QueryBuilders;

use Domain\Companies\Models\Company;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Builder;

class StoreQueryBuilder extends Builder
{
    public function forUser(User $user)
    {
        $company = $user->company;
        return $this->whereCompanyId($company->id);
    }
}
