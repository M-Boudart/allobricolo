<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Locality;
use App\Models\User;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('announcements')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $announcements = [
            [
                'applicant_login' => 'bob123',
                'title' => 'Changer ma douche',
                'address' => 'Boulevard de la Rue 65',
                'locality_postal_code' => 1160,
                'price' => 160,
                'description' => 'Je dois changer ma douche qui date de 2010.',
                'phone' => '0485652598',
                'created_at' => '2021-01-10 13:01:05',
                'realised_at' => null,
            ],
            [
                'applicant_login' => 'alain123',
                'title' => 'Refaire mon evier',
                'address' => 'Boulevard du Midi 54',
                'locality_postal_code' => 1000,
                'price' => 250,
                'description' => null,
                'phone' => '0445256598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => '2021-10-24 14:00:00',
            ],
            [
                'applicant_login' => 'pierre123',
                'title' => 'Tailler un arbe dans mon jardin',
                'address' => 'Avenue des Volontaires 154',
                'locality_postal_code' => 1050,
                'price' => 100,
                'description' => 'Tailler un vieu boulleau datant du 15ème siècle',
                'phone' => '0444525265',
                'created_at' => '2021-04-24 00:10:47',
                'realised_at' => null,
            ],
            [
                'applicant_login' => 'andre123',
                'title' => 'Peindre ma chambre',
                'address' => 'Avenue du Delta 78',
                'locality_postal_code' => 1180,
                'price' => 15,
                'description' => 'Il faut peindre 1 des murs de ma chambre en bleu.',
                'phone' => '0485652598',
                'created_at' => '2021-04-19 13:50:45',
                'realised_at' => null,
            ],
            [
                'applicant_login' => 'marie123',
                'title' => 'Installer Windows 10 sur mon nouveau pc',
                'address' => 'Rue du Boulevard 57',
                'locality_postal_code' => 1190,
                'price' => 10.50,
                'description' => 'J\'aimerais installer windows 10 sur mon nouvel ordinateur.',
                'phone' => '0485652598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => '2021-05-24 14:01:00',
            ],
            [
                'applicant_login' => 'bob123',
                'title' => 'Construire une nouvel étage à ma maison',
                'address' => 'Boulevard du Régent 10',
                'locality_postal_code' => 1050,
                'price' => 999,
                'description' => null,
                'phone' => '0485652598',
                'created_at' => '2020-10-14 00:00:00',
                'realised_at' => null,
            ],
            [
                'applicant_login' => 'john123',
                'title' => 'Monter un meuble Ikea',
                'address' => 'Rue du Moulin 1',
                'locality_postal_code' => 1050,
                'price' => 20,
                'description' => null,
                'phone' => '0485652598',
                'created_at' => '2020-10-14 00:00:00',
                'realised_at' => null,
            ],
            [
                'applicant_login' => 'marie123',
                'title' => 'Créer un potagé dans mon jardin',
                'address' => 'Rue de la Nature 111',
                'locality_postal_code' => 1060,
                'price' => 50,
                'description' => null,
                'phone' => '0485652598',
                'created_at' => '2020-10-14 00:00:00',
                'realised_at' => null,
            ],
            [
                'applicant_login' => 'juliette123',
                'title' => 'Je recherche un sexfriend',
                'address' => 'Boulevard de la Jouissance 27',
                'locality_postal_code' => 1180,
                'price' => 100,
                'description' => 'Je cherche un sexfriend car le confinement me pèse',
                'phone' => '0483296580',
                'created_at' => '2021-05-8 12:24:10',
                'realised_at' => null,
            ],
        ];

        for ($i = 0; $i < 50; $i++) {
            $announcements[] = [
                'applicant_login' => 'Lorem ipsum' . $i,
                'title' => 'Lorem ipsum dolor. ',
                'address' => 'Lorem ipsum dolor.',
                'locality_postal_code' => 1180,
                'price' => $i * 3,
                'description' => '
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt sit amet libero sit amet.',
                'phone' => '0483296580',
                'created_at' => '2019-05-8 10:00:00',
                'realised_at' => null,
            ];
        }

        for ($i = 0; $i < 7; $i++) {
            $announcements[] = [
                'applicant_login' => 'bob123',
                'title' => 'Lorem ipsum dolor. ',
                'address' => 'Lorem ipsum dolor.',
                'locality_postal_code' => 1180,
                'price' => $i * 3,
                'description' => '
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt sit amet libero sit amet.',
                'phone' => '0483296580',
                'created_at' => '2021-05-8 10:00:00',
                'realised_at' => null,
            ];
        }

        foreach ($announcements as &$announcement) {
            $locality = Locality::firstWhere('postal_code', $announcement['locality_postal_code']);
            $user = User::firstWhere('login', $announcement['applicant_login']);

            $announcement['applicant_user_id'] = $user->id;
            $announcement['locality_id'] = $locality->id;

            unset($announcement['applicant_login']);
            unset($announcement['locality_postal_code']);
        }

        DB::table('announcements')->insert(
            $announcements
        );
    }
}
