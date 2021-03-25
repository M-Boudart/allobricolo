<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Announcement;
use Illuminate\Support\Facades\Hash;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('payments')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $payments = [
            [
                'announcement_id' => 5,
                'card_nummer' => '352565256525',
                'ammount' => 20,
                'payed_at' => '2021-05-25 10:00:00',
            ],
            [
                'announcement_id' => 2,
                'card_nummer' => '352565256525',
                'ammount' => 250,
                'payed_at' => '2021-10-30 14:00:00',
            ],
        ];

        foreach ($payments as $payment) {
            $announcement = Announcement::firstWhere('id', $payment['announcement_id']);

            DB::table('payments')->insert([
                'announcement_id' => $announcement->id,
                'card_nummer' => Hash::make($payment['card_nummer']),
                'ammount' => $payment['ammount'],
                'payed_at' => $payment['payed_at'],
            ]);
        }
    }
}
