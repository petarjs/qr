<?php

namespace Database\Seeders;

use Domain\Companies\Models\Company;
use Domain\Menus\Actions\CreateMenuAction;
use Domain\Menus\DataTransferObjects\MenuData;
use Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMenuAction = app(CreateMenuAction::class);
        $manager = User::whereEmail('petar+manager@quantox.com')->first();

        $menuData = new MenuData([
            'name' => 'Drinks',
        ]);

        $menu = $createMenuAction->execute($manager, $menuData);

        $menuItemGroup1 = $menu->menuItemGroups()->create([
            'name' => 'Best Coffees in Town',
            'description' => 'Try our special coffees, perfect for the mornings',
            'order' => 1,
        ]);

        $menuItemGroup2 = $menu->menuItemGroups()->create([
            'name' => 'Soft Drinks',
            'description' => 'Tasty fizzy goodness to lift your spirit',
            'order' => 2,
        ]);

        $menuItemGroup1->menuItems()->create([
            'name' => 'Columbia Aeropress',
            'description' => 'Subtle notes of caramel and strong body',
            'order' => 1,
            'price' => 490,
        ]);
        $menuItemGroup1->menuItems()->create([
            'name' => 'Costa Rica Drip',
            'description' => 'Floral notes - Tangerine, Bergamot, Green Apple acidity ',
            'order' => 2,
            'price' => 430,
        ]);

        $menuItemGroup2->menuItems()->create([
            'name' => 'Ginger Soda',
            'order' => 1,
            'price' => 220,
        ]);
        $menuItemGroup2->menuItems()->create([
            'name' => 'Fizz buzz soda',
            'order' => 2,
            'price' => 325,
        ]);

    }
}
