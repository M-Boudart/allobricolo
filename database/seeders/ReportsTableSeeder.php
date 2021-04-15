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
                'status' => 'pending',
                'type' => 'announcement',
                'object_id' => 2,
                'object_author_login' => 'alain123',
                'reported_by_login' => 'bob123',
                'description' => 'azeazeaze',
                'reported_at' => '2021-01-01',
            ],
            [
                'status' => 'moderated',
                'type' => 'review',
                'object_id' => 3,
                'object_author_login' => 'adrien123',
                'reported_by_login' => 'john123',
                'description' => 'Elle ne m\'a pas payé',
                'reported_at' => '2021-03-03',
            ],
            [
                'status' => 'moderated',
                'type' => 'profile',
                'object_id' => 3,
                'object_author_login' => 'marie123',
                'reported_by_login' => 'pierre123',
                'description' => 'Sa photo de profil est choquante',
                'reported_at' => '2021-04-15',
            ],
            [
                'status' => 'moderated',
                'type' => 'announcement',
                'object_id' => 5,
                'object_author_login' => 'marie123',
                'reported_by_login' => 'bob123',
                'description' => 'On dirait une annonce pour d\'une maison close...',
                'reported_at' => '2020-12-12',
            ],
        ];

        foreach ($reports as &$report) {
            $reportedByUser = User::firstWhere('login', $report['reported_by_login']);
            $objectAuthorUser = User::firstWhere('login', $report['object_author_login']);

            $report['reported_by'] = $reportedByUser->id;
            $report['object_author'] = $objectAuthorUser->id;

            unset($report['reported_by_login']);
            unset($report['object_author_login']);

        }

        DB::table('reports')->insert(
            $reports,
        );
    }
}
