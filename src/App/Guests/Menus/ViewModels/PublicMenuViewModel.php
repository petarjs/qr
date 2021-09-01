<?php

namespace App\Guests\Menus\ViewModels;

use Domain\Companies\Models\Company;
use Domain\Menus\Models\Menu;
use Spatie\ViewModels\ViewModel;

class PublicMenuViewModel extends ViewModel
{
    public Menu $menu;
    public Company $company;

    public function __construct(Company $company, Menu $menu)
    {
        $this->company = $company;
        $this->menu = $menu;
    }

}
