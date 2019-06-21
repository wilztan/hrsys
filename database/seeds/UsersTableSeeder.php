<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'role'=>'ADMIN'
        ]);


        User::create([
            'name' => 'director',
            'email' => 'director@admin.com',
            'password' => Hash::make('admin123'),
            'role'=>'DIRECTOR'
        ]);

        User::create([

            'name' => 'sample',
            'email' => 'sample@sample.com',
            'password' => Hash::make('sample'),
            'role'=>'APPLICANT'
        ]);
    }
}
