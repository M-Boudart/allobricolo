<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('reports')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $reports = [
            [
                'type' => 'announcement',
                'object_id' => 2,
                'reported_by_login' => 'bob123',
                'description' => 'azeazeaze',
                'reported_at' => '2021-01-01',
            ],
            [
                'type' => 'review',
                'object_id' => 3,
                'reported_by_login' => 'john123',
                'description' => 'C\'est un manque de respect de dire ça d\'une personne quand bien même elle a des difficultés !',
                'reported_at' => '2021-10-03',
            ],
            [
                'type' => 'profile',
                'object_id' => 3,
                'reported_by_login' => 'pierre123',
                'description' => 'Sa photo de profil est choquante',
                'reported_at' => '2020-10-03',
            ],
            [
                'type' => 'announcement',
                'object_id' => 5,
                'reported_by_login' => 'bob123',
                'description' => 'On dirait une annonce pour d\'une maison close...',
                'reported_at' => '2020-12-12',
            ],
        ];

        foreach ($reports as &$report) {
            $user = User::firstWhere('login', $report['reported_by_login']);

            $report['reported_by'] = $user->id;

            unset($report['reported_by_login']);

        }

        DB::table('reports')->insert(
            $reports,
        );
    }
}
