<?php

namespace Database\Seeders;

use Domain\Companies\Models\Company;
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
        $manager = User::whereEmail('petar+manager@quantox.com')->first();
        $company = $manager->company;

        $menu = $company->menus()->create([
            'name' => 'Drinks',
        ]);

        $menuItemGroup1 = $menu->menuItemGroups()->create([
            'name' => 'Best Coffees in Town',
            'order' => 1,
        ]);

        $menuItemGroup2 = $menu->menuItemGroups()->create([
            'name' => 'Soft Drinks',
            'order' => 2,
        ]);

        $menuItemGroup1->menuItems()->create([
            'name' => 'Columbia Aeropress',
            'order' => 1,
            'price' => 490,
        ]);
        $menuItemGroup1->menuItems()->create([
            'name' => 'Costa Rica Drip',
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
