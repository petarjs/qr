<?php

namespace App\Users\Menus\Controllers;

use App\Users\Menus\Requests\SaveMenuRequest;
use App\Users\Menus\ViewModels\MenuCreateViewModel;
use App\Users\Menus\ViewModels\MenuDetailsViewModel;
use App\Users\Menus\ViewModels\MenuIndexViewModel;
use Domain\Menus\Actions\CreateMenuAction;
use Domain\Menus\DataTransferObjects\MenuData;
use Domain\Menus\Models\Menu;
use Domain\Stores\Actions\SaveStoreAction;
use Illuminate\Http\Request;

class MenuController
{

    private CreateMenuAction $createMenuAction;

    public function __construct(
        CreateMenuAction $createMenuAction
    )
    {

        $this->createMenuAction = $createMenuAction;
    }

    public function index(Request $request)
    {
        return (new MenuIndexViewModel($request))->view('users.menus.index');
    }

    public function show(Request $request, Menu $menu)
    {
        return (new MenuDetailsViewModel($menu))->view('users.menus.show');
    }

    public function createOrEdit(Menu $menu)
    {
        return (new MenuCreateViewModel($menu))->view('users.menus.create');
    }

    public function save(SaveMenuRequest $request, ?Menu $menu)
    {
        $data = new MenuData($request->validated());
        $user = $request->user();

        if ($menu->id !== null) {
//            $menu = $this->updateStoreAction->execute($store, $data);
        } else {
            $menu = $this->createMenuAction->execute($user, $data);
        }

        return redirect(route('users.menus.index'))
            ->with('flash.banner', "Menu {$menu->name} saved!");
    }


}
