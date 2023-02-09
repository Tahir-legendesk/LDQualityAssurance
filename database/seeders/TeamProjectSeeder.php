<?php

namespace Database\Seeders;

use App\Models\TeamProject;
use Illuminate\Database\Seeder;

class TeamProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamProject::factory()->count(10)->create();
    }
}
