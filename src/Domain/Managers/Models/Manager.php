<?php

namespace Domain\Managers\Models;

use Domain\Managers\QueryBuilders\ManagerQueryBuilder;
use Domain\Roles\Enums\RoleEnum;
use Domain\Users\Models\User;
use Support\Traits\HasParentModel;

class Manager extends User
{
    use HasParentModel;

    public function newEloquentBuilder($query): ManagerQueryBuilder
    {
        return new ManagerQueryBuilder($query);
    }

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->role(RoleEnum::manager()->value);
    }
}
