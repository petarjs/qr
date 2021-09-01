<?php

namespace App\Users\Menus\ViewModels;

use Domain\Menus\Actions\GenerateMenuURLAction;
use Domain\Menus\Models\Menu;
use Spatie\ViewModels\ViewModel;

class MenuDetailsViewModel extends ViewModel
{
    public Menu $menu;
    public string $menuPublicUrl;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
        $this->menuPublicUrl = app(GenerateMenuURLAction::class)->execute($menu);
    }
}
