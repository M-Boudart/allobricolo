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
                'picture_url' => null,
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
                'picture_url' => 'marie.jpeg',
                'status_name' => 'Membre',
            ],
            [
                'login' => 'pierre123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Pierre',
                'lastname' => 'Caillou',
                'email' => 'pierre@rocher.com',
                'description' => null,
                'picture_url' => 'pierre.jpg',
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
            [
                'login' => 'andre123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'André',
                'lastname' => 'Coppard',
                'email' => 'andre@coppard.com',
                'description' => null,
                'picture_url' => null,
                'status_name' => 'Membre',
            ],
            [
                'login' => 'juliette123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Juliette',
                'lastname' => 'Clique',
                'email' => 'juliette@clique.com',
                'description' => null,
                'picture_url' => null,
                'status_name' => 'Membre',
            ],
            [
                'login' => 'manon123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Manon',
                'lastname' => 'Chocolat',
                'email' => 'manon@chocolat.com',
                'description' => null,
                'picture_url' => null,
                'status_name' => 'Vérifié',
            ],
            [
                'login' => 'adrien123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Adrien',
                'lastname' => 'Lonon',
                'email' => 'adrien@lonon.com',
                'description' => null,
                'picture_url' => null,
                'status_name' => 'Vérifié',
            ],
        ];

        foreach ($users as &$user) {
            $status = Status::firstWhere('status', $user['status_name']);

            $user['status_id'] = $status->id;

            unset($user['status_name']);
        }

        DB::table('users')->insert(
            $users,
        );
    }
}
