<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Status;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $users = [
            [
                'login' => 'bob123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'bob',
                'lastname' => 'sull',
                'email' => 'bob@sull.com',
                'description' => null,
                'picture_url' => 'bob.jpg',
                'status_name' => 'Admin',
            ],
            [
                'login' => 'john123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'john',
                'lastname' => 'doe',
                'email' => 'john@outlook.com',
                'description' => 'Je suis pationné de bricolage depuis mon plus jeune âge.',
                'picture_url' => 'john.jpg',
                'status_name' => 'Membre',
            ],
            [
                'login' => 'marie123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Marie',
                'lastname' => 'Doe',
                'email' => 'Marie@doe.com',
                'description' => 'J\'ai étudié l\'informatique pendant prêt de 5 ans.',
                'picture_url' => null,
                'status_name' => 'Membre',
            ],
            [
                'login' => 'pierre123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Pierre',
                'lastname' => 'Caillou',
                'email' => 'pierre@rocher.com',
                'description' => null,
                'picture_url' => 'brique.jpg',
                'status_name' => 'Vérifié',
            ],
            [
                'login' => 'alain123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Alain',
                'lastname' => 'Ternet',
                'email' => 'alain@terrieur.com',
                'description' => 'J\'ai pas mal de connaiossances dans la menuiserie et la plomberie.',
                'picture_url' => null,
                'status_name' => 'Modérateur',
            ],
        ];

        foreach ($users as $user) {
            $status = Status::firstWhere('status', $user['status_name']);

            DB::table('users')->insert([
                'login' => $user['login'],
                'password' => $user['password'],
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'description' => $user['email'],
                'picture_url' => $user['picture_url'],
                'status_id' => $status->id,
            ]);
        }
    }
}
