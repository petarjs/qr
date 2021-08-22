<?php

namespace Domain\Operator\Models;

use Domain\Operators\QueryBuilders\OperatorQueryBuilder;
use Domain\Roles\Enums\RoleEnum;
use Domain\Users\Models\User;
use Support\Traits\HasParentModel;

class Operator extends User
{
    use HasParentModel;

    public function newEloquentBuilder($query): OperatorQueryBuilder
    {
        return new OperatorQueryBuilder($query);
    }

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->role(RoleEnum::operator()->value);
    }
}
