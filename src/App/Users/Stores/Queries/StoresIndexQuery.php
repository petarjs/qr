<?php

namespace App\Users\Stores\Queries;

use Domain\Stores\Models\Store;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class StoresIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Store::forUser($request->user());

        parent::__construct($query, $request);

        $this
            ->allowedFilters([
                'name',
            ])
            ->allowedSorts(
                'created_at',
            );
    }
}
