<?php

namespace App\Users\Menus\Controllers;

use Domain\Companies\Models\Company;
use Domain\Menus\Models\Menu;
use Domain\Stores\Actions\SaveStoreAction;
use Domain\Stores\Models\Store;
use Illuminate\Http\Request;

class PublicMenuController
{


    public function __construct()
    {

    }


    public function show(Request $request, Company $company, Menu $menu)
    {
        return "menu for {$company->name} {$menu->name}";
    }


}
