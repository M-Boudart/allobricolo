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
                'to_date' => '2021-01-02',
                'reason' => 4,
            ],
            [
                'user_id_login' => 'john123', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended', 
                'from_date' => '2021-09-03', 
                'to_date' => '2021-09-04',
                'reason' => 2,
            ],
            [
                'user_id_login' => 'john123', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended', 
                'from_date' => '2021-09-04', 
                'to_date' => '2021-09-07',
                'reason' => 2,
            ],
            [
                'user_id_login' => 'pierre123', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended', 
                'from_date' => '2021-09-15', 
                'to_date' => '2021-09-16',
                'reason' => 2,
            ],
            [
                'user_id_login' => 'manon123', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended', 
                'from_date' => '2021-09-01', 
                'to_date' => '2021-09-02',
                'reason' => 2,
            ],
            [
                'user_id_login' => 'john123', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended', 
                'from_date' => '2021-10-10', 
                'to_date' => '2021-10-17',
                'reason' => 2,
            ],
            [
                'user_id_login' => 'adrien123', 
                'reported_by_login' => 'bob123', 
                'type' => 'suspended', 
                'from_date' => '2021-01-06', 
                'to_date' => '2021-01-07',
                'reason' => 5,
            ],
            [
                'user_id_login' => 'adrien123', 
                'reported_by_login' => 'bob123', 
                'type' => 'suspended', 
                'from_date' => '2021-02-10', 
                'to_date' => '2021-02-13',
                'reason' => 6,
            ],
            [
                'user_id_login' => 'marie123', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended', 
                'from_date' => '2021-09-10', 
                'to_date' => '2021-09-13',
                'reason' => 3,
            ],
            [
                'user_id_login' => 'adrien123', 
                'reported_by_login' => 'bob123', 
                'type' => 'suspended', 
                'from_date' => '2021-09-20', 
                'to_date' => '2021-09-27',
                'reason' => 7,
            ],
            [
                'user_id_login' => 'adrien123', 
                'reported_by_login' => 'alain123', 
                'type' => 'banned', 
                'from_date' => '2021-10-13', 
                'to_date' => null,
                'reason' => 8,
            ],
            [
                'user_id_login' => 'Lorem ipsum0', 
                'reported_by_login' => 'bob123', 
                'type' => 'suspended',
                'from_date' => '2021-02-02', 
                'to_date' => '2021-02-03',
                'reason' => 11,
            ],
            [
                'user_id_login' => 'Lorem ipsum0', 
                'reported_by_login' => 'alain123', 
                'type' => 'suspended',
                'from_date' => '2021-03-01', 
                'to_date' => '2021-03-04',
                'reason' => 12,
            ],
            [
                'user_id_login' => 'Lorem ipsum0', 
                'reported_by_login' => 'bob123', 
                'type' => 'suspended',
                'from_date' => '2021-03-10', 
                'to_date' => '2021-03-17',
                'reason' => 13,
            ],
            [
                'user_id_login' => 'Lorem ipsum0', 
                'reported_by_login' => 'alain123', 
                'type' => 'banned',
                'from_date' => '2021-03-15', 
                'to_date' => null,
                'reason' => 14,
            ],
        ];

        for($i = 1; $i < 7; $i++) {
            $punishments[] = [
                'user_id_login' => 'Lorem ipsum' . $i, 
                'reported_by_login' => 'alain123', 
                'type' => 'banned',
                'from_date' => '2021-10-06', 
                'to_date' => null,
                'reason' => 14,
            ];
        }

        $punishments[] = [
            'user_id_login' => 'Lorem ipsum25', 
            'reported_by_login' => 'bob123', 
            'type' => 'unbanned',
            'from_date' => '2021-10-05', 
            'to_date' => '2121-10-10',
            'reason' => 14,
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
