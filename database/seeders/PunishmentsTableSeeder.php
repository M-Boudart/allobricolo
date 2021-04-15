<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PunishmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('punishments')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $punishments = [
            [
                'user_id_login' => 'marie123', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended',
                'from_date' => '2021-01-01', 
                'to_date' => '2021-01-08',
                'reason' => 4,
            ],
            [
                'user_id_login' => 'john123', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended', 
                'from_date' => '2021-03-04', 
                'to_date' => '2021-03-11',
                'reason' => 2,
            ],
            [
                'user_id_login' => 'marie123', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended', 
                'from_date' => '2021-02-10', 
                'to_date' => '2021-02-17',
                'reason' => 3,
            ],
        ];

        foreach ($punishments as &$punishment) {
            $reportedUser = User::firstWhere('login', $punishment['user_id_login']);
            $reporterUser = User::firstWhere('login', $punishment['reported_by_login']);

            $punishment['user_id'] = $reportedUser->id;
            $punishment['reported_by'] = $reporterUser->id;

            unset($punishment['user_id_login']);
            unset($punishment['reported_by_login']);
        }

        DB::table('punishments')->insert(
            $punishments,
        );
    }
}
