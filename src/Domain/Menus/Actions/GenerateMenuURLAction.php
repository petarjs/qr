<?php

namespace Domain\Menus\Actions;

use Domain\Companies\Actions\FindCompanyByUserAction;
use Domain\Companies\Models\Company;
use Domain\Menus\DataTransferObjects\MenuData;
use Domain\Menus\Models\Menu;
use Domain\Stores\DataTransferObjects\StoreData;
use Domain\Stores\Models\Store;
use Domain\Users\Models\User;

class GenerateMenuURLAction
{

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(Menu $menu): string
    {
        return route('guests.menus.show', ['company' => $menu->company, 'menu' => $menu]);
    }
}
