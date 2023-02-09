<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'name' => 'logo',
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'marketing',
                'is_active' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'development',
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'sales',
                'is_active' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'hr',
                'is_active' => 1,
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('teams')->insert($teams);
    }
}
