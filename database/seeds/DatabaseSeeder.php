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
         $this->call(SexSeeder::class);
         $this->call(CivilStatusSeeder::class);
         $this->call(SuffixSeeder::class);
         $this->call(UsersTableSeeder::class);
    }
}
