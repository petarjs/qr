<?php

namespace App\Users\Menus\ViewModels;

use App\Users\Menus\Queries\MenuIndexQuery;
use Domain\Menus\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\ViewModels\ViewModel;

class MenuDetailsViewModel extends ViewModel
{
    public Menu $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }
}
