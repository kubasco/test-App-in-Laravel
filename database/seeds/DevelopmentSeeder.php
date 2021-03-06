<?php

use App\Companies;
use App\Positions;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUsersNumber = 20;
        $newCompaniesNumber = 20;

        /**
         * dev user
         */
        factory(User::class)->create([
            'name' => 'Admin Account',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);

        /**
         * Companies
         */
        $newCompanies = factory(Companies::class, $newCompaniesNumber)->create();

        /**
         * Positions
         */
        $positionsIds = 0;
        $references = Config::get('positions.references');
        foreach ($newCompanies as $newCompany) {
            factory(Positions::class, $newCompaniesNumber)->create([
                'companies_id' => $newCompany->id,
                'reference' => $references[mt_rand(0, 3)],
            ]);
            $positionsIds += $newCompaniesNumber;
        }

        /**
         * Users
         */
        factory(User::class, $newUsersNumber)->create([
            'positions_id' => rand(0, $positionsIds)
        ]);
    }
}
