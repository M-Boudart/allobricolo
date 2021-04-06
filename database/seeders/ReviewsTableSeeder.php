<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('reviews')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $reviews = [
            [
                'announcement_id' => 2,
                'note' => 7,
                'description' => null,
            ],
            [
                'announcement_id' => 5,
                'note' => 10,
                'description' => 'Travail magnifique, personne qualifiée, polie et ponctuelle !',
            ],
            [
                'announcement_id' => 1,
                'note' => 1,
                'description' => 'Incapable fini, je déconseille à quiconque veut avoir affaire à ses service... Raciste, incompétant et j\'en passe !',
            ],
            [
                'announcement_id' => 3,
                'note' => 6,
                'description' => 'Travail bien réalisé sans plus.',
            ],
            [
                'announcement_id' => 4,
                'note' => 5,
                'description' => null,
            ],
        ];

            DB::table('reviews')->insert(
                $reviews,
            );
    }
}
