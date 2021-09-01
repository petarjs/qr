<?php

namespace App\Guests\Menus\Controllers;

use App\Guests\Menus\ViewModels\PublicMenuViewModel;
use Domain\Companies\Models\Company;
use Domain\Menus\Models\Menu;
use Domain\Stores\Actions\SaveStoreAction;
use Illuminate\Http\Request;

class PublicMenuController
{


    public function __construct()
    {

    }


    public function show(Request $request, Company $company, Menu $menu)
    {
        return (new PublicMenuViewModel($company, $menu))->view('guests.menus.show');
    }


}
