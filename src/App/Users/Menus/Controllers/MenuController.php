<?php

namespace App\Users\Menus\Controllers;

use App\Users\Menus\ViewModels\MenuDetailsViewModel;
use App\Users\Menus\ViewModels\MenuIndexViewModel;
use Domain\Menus\Models\Menu;
use Domain\Stores\Actions\SaveStoreAction;
use Illuminate\Http\Request;

class MenuController
{

    public function __construct(

    )
    {

    }

    public function index(Request $request)
    {
        return (new MenuIndexViewModel($request))->view('users.menus.index');
    }

    public function show(Request $request, Menu $menu)
    {
        return (new MenuDetailsViewModel($menu))->view('users.menus.show');
    }


}
