<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StudentSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     $this->call(RoleSeeder::class);
     $this->call(UserSeeder::class);
     $this->call(StudentSeeder::class);
    }
}
