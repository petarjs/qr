<?php

namespace Domain\Companies\QueryBuilders;

use Domain\Companies\Models\Company;
use Illuminate\Database\Eloquent\Builder;

class CompanyQueryBuilder extends Builder
{
    public function forOwner(User $user): ?Company
    {
        return $this->whereOwnerId($user->id);
    }
}
