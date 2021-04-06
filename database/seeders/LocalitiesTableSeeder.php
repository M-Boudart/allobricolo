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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('localities')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $localities = [
            [
                'postal_code' => 1000,
                'locality' => 'Bruxelles-Ville',
            ],
            [
                'postal_code' => 1030,
                'locality' => 'Schaerbeek',
            ],
            [
                'postal_code' => 1040,
                'locality' => 'Etterbeek',
            ],
            [
                'postal_code' => 1050,
                'locality' => 'Ixelles',
            ],
            [
                'postal_code' => 1060,
                'locality' => 'Saint-Gilles',
            ],
            [
                'postal_code' => 1070,
                'locality' => 'Anderlecht',
            ],
            [
                'postal_code' => 1080,
                'locality' => 'Molenbeek-St-Jean',
            ],
            [
                'postal_code' => 1081,
                'locality' => 'Koekelberg',
            ],
            [
                'postal_code' => 1082,
                'locality' => 'Berchem-Ste-Agathe',
            ],
            [
                'postal_code' => 1083,
                'locality' => 'Ganshoren',
            ],
            [
                'postal_code' => 1090,
                'locality' => 'Jette',
            ],
            [
                'postal_code' => 1140,
                'locality' => 'Evere',
            ],
            [
                'postal_code' => 1150,
                'locality' => 'Woluwé-St-Pierre',
            ],
            [
                'postal_code' => 1160,
                'locality' => 'Auderghem',
            ],
            [
                'postal_code' => 1170,
                'locality' => 'Watermael-Boitsfort',
            ],
            [
                'postal_code' => 1180,
                'locality' => 'Uccle',
            ],
            [
                'postal_code' => 1190,
                'locality' => 'Forest',
            ],
            [
                'postal_code' => 1200,
                'locality' => 'Woluwé-St-Lambert',
            ],
            [
                'postal_code' => 1210,
                'locality' => 'St Josse-ten-Noode',
            ],
        ];

            DB::table('localities')->insert(
                $localities,
            );
    }
}
