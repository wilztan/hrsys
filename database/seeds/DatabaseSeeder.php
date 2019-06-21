<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PsychoTestsTableSeeder::class);
        $this->call(ScoringTypesTableSeeder::class);
        $this->call(ScoringValuesTableSeeder::class);
    }
}
