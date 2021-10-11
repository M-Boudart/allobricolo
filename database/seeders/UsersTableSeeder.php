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
                'avatar' => 'avatar.png',
                'status_name' => 'Admin',
                'name' => 'Bob Sull',
            ],
            [
                'login' => 'john123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'john',
                'lastname' => 'doe',
                'email' => 'john@outlook.com',
                'description' => 'Je suis pationné de bricolage depuis mon plus jeune âge.',
                'avatar' => 'john.jpg',
                'status_name' => 'Membre',
                'name' => 'John Doe',
            ],
            [
                'login' => 'marie123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Marie',
                'lastname' => 'Doe',
                'email' => 'Marie@doe.com',
                'description' => 'J\'ai étudié l\'informatique pendant prêt de 5 ans.',
                'avatar' => 'marie.jpeg',
                'status_name' => 'Membre',
                'name' => 'Marie Doe',
            ],
            [
                'login' => 'pierre123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Pierre',
                'lastname' => 'Caillou',
                'email' => 'pierre@rocher.com',
                'description' => 'Bonjour à tous, je m\'appelle Pierre. J\'adore tout ce qui est travail manuel. J\'ai un préférence pour tout ce que touche de prêt où de loin à l\'électricité et plus particulièrement à l\'informatique. Je dispose d\'un diplôme d\'électricien et d\'informaticien.',
                'avatar' => 'pierre.jpg',
                'status_name' => 'Vérifié',
                'name' => 'Pierre Caillou',
            ],
            [
                'login' => 'alain123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Alain',
                'lastname' => 'Ternet',
                'email' => 'alain@terrieur.com',
                'description' => 'J\'ai pas mal de connaiossances dans la menuiserie et la plomberie.',
                'avatar' => 'avatar.png',
                'status_name' => 'Modérateur',
                'name' => 'Alain Ternet',
            ],
            [
                'login' => 'andre123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'André',
                'lastname' => 'Coppard',
                'email' => 'andre@coppard.com',
                'description' => null,
                'avatar' => 'homme-nu.jpg',
                'status_name' => 'Membre',
                'name' => 'André Coppard',
            ],
            [
                'login' => 'juliette123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Juliette',
                'lastname' => 'Clique',
                'email' => 'juliette@clique.com',
                'description' => null,
                'avatar' => 'avatar.png',
                'status_name' => 'Membre',
                'name' => 'Juliette Clique',
            ],
            [
                'login' => 'manon123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Manon',
                'lastname' => 'Chocolat',
                'email' => 'manon@chocolat.com',
                'description' => 'Jeune passionnée de décoration et peinture. Je suis décoratrice d\'intérieur depuis maintenant 1 an. Je profite donc de ce magnifique site pour aider les personnes souhaitant rénover leur décoration. N\'hésitez pas à demander des conseils!',
                'avatar' => 'wejdene.jpg',
                'status_name' => 'Vérifié',
                'name' => 'Manon Chocolat',
            ],
            [
                'login' => 'adrien123',
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Adrien',
                'lastname' => 'Lonon',
                'email' => 'adrien@lonon.com',
                'description' => 'Je suis un passioné de jardinage et plus particulièrement des plantes japonaise telle que le bonsai et le cerisié. J\'ai suivi une formation de 3 mois au Japon afin d\'acquérir un maximum de connaissance dans ces arbres majestueux.',
                'avatar' => 'adrien.jpg',
                'status_name' => 'Vérifié',
                'name' => 'Adrien Lonon',
            ],
        ];

        for ($i = 0; $i < 10; $i++) {
            $users[] = [
                'login' => 'Lorem ipsum' . $i,
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Lorem',
                'lastname' => 'Ipsum',
                'email' => 'lorem@ipsum' . $i . '.com',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in.',
                'avatar' => 'avatar.png',
                'status_name' => 'Membre',
                'name' => 'Lorem Ipsum' . $i,
            ];
        }

        for ($i = 10; $i < 20; $i++) {
            $users[] = [
                'login' => 'Lorem ipsum' . $i,
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Lorem',
                'lastname' => 'Ipsum',
                'email' => 'lorem@ipsum' . $i . '.com',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in.',
                'avatar' => 'avatar.png',
                'status_name' => 'Vérifié',
                'name' => 'Lorem Ipsum' . $i,
            ];
        }

        for ($i = 20; $i < 30; $i++) {
            $users[] = [
                'login' => 'Lorem ipsum' . $i,
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Lorem',
                'lastname' => 'Ipsum',
                'email' => 'lorem@ipsum' . $i . '.com',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in.',
                'avatar' => 'avatar.png',
                'status_name' => 'Modérateur',
                'name' => 'Lorem Ipsum' . $i,
            ];
        }

        for ($i = 30; $i < 40; $i++) {
            $users[] = [
                'login' => 'Lorem ipsum' . $i,
                'password' => '$2y$10$IQ8s5wZ2cCWR.kVXVgzB3umQYXaVEqTueAy2x6.Xj/opk6JKMXrzu',
                'firstname' => 'Lorem',
                'lastname' => 'Ipsum',
                'email' => 'lorem@ipsum' . $i . '.com',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in.',
                'avatar' => 'avatar.png',
                'status_name' => 'Admin',
                'name' => 'Lorem Ipsum' . $i,
            ];
        }

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
