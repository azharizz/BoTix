<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "balance" =>0,
            "password" => Hash::make('admin')
            ]);
    }
}
