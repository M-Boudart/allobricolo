<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $localities = [
            [
                'postal_code' => 1050,
                'locality' => 'Ixelles',
            ],
            [
                'postal_code' => 1160,
                'locality' => 'Auderghem',
            ],
            [
                'postal_code' => 1090,
                'locality' => 'Forest',
            ],
            [
                'postal_code' => 1000,
                'locality' => 'Bruxelles',
            ],
        ];

        foreach($localities as $locality) {
            DB::table('localities')->insert([
                'postal_code' => $locality['postal_code'],
                'locality' => $locality['locality'],
            ]);
        }
    }
}
