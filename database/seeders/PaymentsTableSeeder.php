<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Announcement;

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
                'payment_id' => 'id_test_4eC39HqLyjWDarjtT1zdp7dc',
                'payed_at' => null,
                'status' => 'pending',
            ],
            [
                'announcement_id' => 2,
                'payment_id' => 'id_test_37C39HqLyjWDarjtT1zdp7dc',
                'payed_at' => '2021-10-30 14:00:00',
                'status' => 'payed',
            ],
        ];

        foreach ($payments as $payment) {
            $announcement = Announcement::firstWhere('id', $payment['announcement_id']);

            DB::table('payments')->insert([
                'announcement_id' => $announcement->id,
                'payment_id' => $payment['payment_id'],
                'payed_at' => $payment['payed_at'],
                'status' => $payment['status'],
            ]);
        }
    }
}
