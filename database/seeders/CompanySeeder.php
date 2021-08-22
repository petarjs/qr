<?php

namespace Database\Seeders;

use Domain\Companies\Models\Company;
use Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = User::whereEmail('petar+manager@quantox.com')->first();
        $operator = User::whereEmail('petar+operator@quantox.com')->first();

        $company = $manager->ownedCompany()->create([
            'name' => 'Fefeterija',
            'currency' => 'rsd',
        ]);

        $company->users()->saveMany([$manager, $operator]);

        $company->stores()->create([
            'name' => 'Fef Zvezdara',
            'address' => 'Krfska 123',
        ]);

        $company->stores()->create([
            'name' => 'Fef Centar',
            'address' => 'Makedonska 123',
        ]);
    }
}
