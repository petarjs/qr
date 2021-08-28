<?php

namespace App\Users\Menus\Queries;

use Domain\Menus\Models\Menu;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class MenuIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Menu::forUser($request->user());

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
