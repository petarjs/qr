<?php

namespace Database\Seeders;

use Domain\Roles\Enums\RoleEnum;
use Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Petar Admin',
            'email' => 'petar+admin@quantox.com',
            'password' => bcrypt('123123123'),
            'email_verified_at' => now(),
        ]);

        $manager = User::create([
            'name' => 'Petar Manager',
            'email' => "petar+manager@quantox.com",
            'password' => bcrypt('123123123'),
            'email_verified_at' => now(),
        ]);

        $operator = User::create([
            'name' => 'Petar Operator',
            'email' => 'petar+operator@quantox.com',
            'password' => bcrypt('123123123'),
            'email_verified_at' => now(),
        ]);

        $admin->assignRole(RoleEnum::admin()->value);
        $manager->assignRole(RoleEnum::manager()->value);
        $operator->assignRole(RoleEnum::operator()->value);
    }
}
