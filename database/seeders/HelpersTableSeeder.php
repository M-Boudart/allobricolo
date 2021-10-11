<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Announcement;

class HelpersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('helpers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $helpers = [
            [
                'announcement_id' => 1,
                'helper_login' => 'marie123',
                'status' => 'pending',
            ],
            [
                'announcement_id' => 1,
                'helper_login' => 'john123',
                'status' => 'pending',
            ],
            [
                'announcement_id' => 2,
                'helper_login' => 'bob123',
                'status' => 'not selected',
            ],
            [
                'announcement_id' => 2,
                'helper_login' => 'pierre123',
                'status' => 'selected',
            ],
            [
                'announcement_id' => 4,
                'helper_login' => 'marie123',
                'status' => 'selected',
            ],
            [
                'announcement_id' => 3,
                'helper_login' => 'bob123',
                'status' => 'pending',
            ],
            [
                'announcement_id' => 5,
                'helper_login' => 'john123',
                'status' => 'pending',
            ],
            [
                'announcement_id' => 4,
                'helper_login' => 'bob123',
                'status' => 'not selected',
            ],
            [
                'announcement_id' => 5,
                'helper_login' => 'pierre123',
                'status' => 'pending',
            ],
            [
                'announcement_id' => 5,
                'helper_login' => 'alain123',
                'status' => 'pending',
            ],
            [
                'announcement_id' => 6,
                'helper_login' => 'alain123',
                'status' => 'not selected',
            ],
            [
                'announcement_id' => 6,
                'helper_login' => 'marie123',
                'status' => 'selected',
            ],
            [
                'announcement_id' => 57,
                'helper_login' => 'bob123',
                'status' => 'selected',
            ],
        ];

        foreach ($helpers as &$helper) {
            $annoucement = Announcement::firstWhere('id', $helper['announcement_id']);
            $userHelper = User::firstWhere('login', $helper['helper_login']);

            $helper['announcement_id'] = $annoucement->id;
            $helper['helper_id'] = $userHelper->id;

            unset($helper['helper_login']);
        }

        DB::table('helpers')->insert(
            $helpers,
        );
    }
}
