<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Announcement;
use App\Models\ChatMessage;

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
                'chat_id' => 1,
            ],
            [
                'announcement_id' => 1,
                'helper_login' => 'john123',
                'status' => 'pending',
                'chat_id' => 2,
            ],
            [
                'announcement_id' => 2,
                'helper_login' => 'bob123',
                'status' => 'not selected',
                'chat_id' => 3,
            ],
            [
                'announcement_id' => 2,
                'helper_login' => 'pierre123',
                'status' => 'selected',
                'chat_id' => 4,
            ],
            [
                'announcement_id' => 4,
                'helper_login' => 'marie123',
                'status' => 'selected',
                'chat_id' => 5,
            ],
            [
                'announcement_id' => 3,
                'helper_login' => 'bob123',
                'status' => 'pending',
                'chat_id' => 6,
            ],
            [
                'announcement_id' => 5,
                'helper_login' => 'bob123',
                'status' => 'pending',
                'chat_id' => 7,
            ],
            [
                'announcement_id' => 5,
                'helper_login' => 'john123',
                'status' => 'pending',
                'chat_id' => 8,
            ],
            [
                'announcement_id' => 5,
                'helper_login' => 'pierre123',
                'status' => 'pending',
                'chat_id' => 9,
            ],
            [
                'announcement_id' => 5,
                'helper_login' => 'alain123',
                'status' => 'pending',
                'chat_id' => 10,
            ],
            [
                'announcement_id' => 6,
                'helper_login' => 'bob123',
                'status' => 'not selected',
                'chat_id' => 11,
            ],
            [
                'announcement_id' => 6,
                'helper_login' => 'alain123',
                'status' => 'not selected',
                'chat_id' => 12,
            ],
            [
                'announcement_id' => 6,
                'helper_login' => 'marie123',
                'status' => 'selected',
                'chat_id' => 13,
            ],
        ];

        foreach ($helpers as $helper) {
            $annoucement = Announcement::firstWhere('id', $helper['announcement_id']);
            $userHelper = User::firstWhere('login', $helper['helper_login']);

            DB::table('helpers')->insert([
                'announcement_id' => $annoucement->id,
                'helper_id' => $userHelper->id,
                'status' => $helper['status'],
                'chat_id' => $helper['chat_id'],
            ]);
        }
    }
}
