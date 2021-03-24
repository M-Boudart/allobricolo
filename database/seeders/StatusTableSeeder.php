<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'status' => 'Membre',
            ],
            [
                'status' => 'Vérifié',
            ],
            [
                'status' => 'Modérateur',
            ],
            [
                'status' => 'Admin',
            ],
        ];

        foreach ($status as $statu) {
            DB::table('status')->insert([
                'status' => $statu['status'],
            ]);
        }
    }
}
