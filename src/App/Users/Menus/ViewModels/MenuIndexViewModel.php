<?php

namespace App\Users\Menus\ViewModels;

use App\Users\Menus\Queries\MenuIndexQuery;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\ViewModels\ViewModel;

class MenuIndexViewModel extends ViewModel
{
    public LengthAwarePaginator $menus;
    public $company;

    public function __construct(Request $request)
    {
        $user = $request->user();
        $query = new MenuIndexQuery($request);
        $this->menus = $query->paginate();
        $this->company = $user->company;
    }
}
