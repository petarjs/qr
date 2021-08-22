<?php

namespace App\Users\Stores\ViewModels;

use App\Users\Stores\Queries\StoresIndexQuery;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\ViewModels\ViewModel;

class StoreIndexViewModel extends ViewModel
{
    public LengthAwarePaginator $stores;
    public $company;

    public function __construct(Request $request)
    {
        $user = $request->user();
        $query = new StoresIndexQuery($request);
        $this->stores = $query->paginate();
        $this->company = $user->company;
    }
}
