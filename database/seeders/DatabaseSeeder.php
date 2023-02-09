<?php

namespace Database\Seeders;

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
        $this->call(
            [
                ProjectSeeder::class,
                RoleSeeder::class,
                TaskSeeder::class,
                TeamProjectSeeder::class,
                TeamSeeder::class,
                UserSeeder::class,
            ]
        );
    }
}
