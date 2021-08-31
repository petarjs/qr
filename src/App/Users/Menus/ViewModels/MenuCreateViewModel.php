<?php

namespace App\Users\Menus\ViewModels;

use Domain\Menus\Models\Menu;
use Spatie\ViewModels\ViewModel;

class MenuCreateViewModel extends ViewModel
{
    public ?Menu $menu;

    public function __construct(?Menu $menu)
    {
        $this->menu = $menu;
    }

    public function isEditing()
    {
        return $this->menu()->id != null;
    }

    public function menu(): Menu
    {
        return $this->menu ?? new Menu();
    }
}
