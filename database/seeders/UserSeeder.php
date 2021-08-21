<?php

namespace Database\Seeders;

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
        ]);

        $operator = User::create([
            'name' => 'Petar Operator',
            'email' => 'petar+operator@quantox.com',
            'password' => bcrypt('123123123'),
        ]);

        $manager = User::create([
            'name' => 'Petar Manager',
            'email' => "petar+manager@quantox.com",
            'password' => bcrypt('123123123'),
        ]);

        $admin->assignRole('admin');
        $manager->assignRole(['manager', 'operator']);
        $operator->assignRole('operator');
    }
}
