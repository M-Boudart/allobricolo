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
                'reason' => 'Elle a insulté quelqu\'un dans un de ses review',
            ],
            [
                'user_id_login' => 'john123', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended', 
                'from_date' => '2021-02-10', 
                'to_date' => '2021-02-17',
                'reason' => 'N\'a pas payé la personne ayant réalisé son annonce',
            ],
            [
                'user_id_login' => 'marie123', 
                'reported_by_login' => 'alain123', 
                'type' => 'banned', 
                'from_date' => '2021-02-10', 
                'to_date' => null,
                'reason' => 'Photo de profile à caractère pornographique',
            ],
        ];

        foreach ($punishments as $punishment) {
            $reportedUser = User::firstWhere('login', $punishment['user_id_login']);
            $reporterUser = User::firstWhere('login', $punishment['reported_by_login']);

            DB::table('punishments')->insert([
                'user_id' => $reportedUser->id,
                'reported_by' => $reporterUser->id,
                'type' => $punishment['type'],
                'from_date' => $punishment['from_date'],
                'to_date' => $punishment['to_date'],
                'reason' => $punishment['reason'],
            ]);
        }
    }
}
