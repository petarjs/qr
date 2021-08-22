<?php

namespace App\Users\CompanyUsers\Queries;

use Domain\Roles\Enums\RoleEnum;
use Domain\Stores\Models\Store;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CompanyUsersIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $user = $request->user();
        $company = $user->company;

        $query = $company->users()->role(RoleEnum::operator()->value);

        parent::__construct($query, $request);

        $this
            ->allowedFilters([
                'name',
                'email',
            ])
            ->allowedSorts(
                'created_at',
            );
    }
}
