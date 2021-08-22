<?php

namespace App\Users\Stores\ViewModels;

use App\Users\Stores\Queries\StoresIndexQuery;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\ViewModels\ViewModel;

class StoreIndexViewModel extends ViewModel
{
    public LengthAwarePaginator $stores;

    public function __construct(StoresIndexQuery $storesIndexQuery)
    {
        $this->stores = $storesIndexQuery->paginate();
    }
}
