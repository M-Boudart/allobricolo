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
        $announcements = [
            [
                'applicant_login' => 'bob123',
                'title' => 'Changer ma douche',
                'address' => 'Boulevard de la Rue 65',
                'locality_postal_code' => 1160,
                'price' => 20,
                'description' => 'Je dois changer ma douche qui date de 2010.',
                'phone' => '0485652598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => null,
            ],
            [
                'applicant_login' => 'alain123',
                'title' => 'Refaire toute ma cuisine',
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
                'price' => 20,
                'description' => 'Tailler un vieu boulleau datant du 15ème siècle',
                'phone' => '0444525265',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => null,
            ],
            [
                'applicant_login' => 'alain123',
                'title' => 'Changer ma douche',
                'address' => 'Boulevard de la Rue 65',
                'locality_postal_code' => 1160,
                'price' => 20,
                'description' => 'Je dois changer ma douche qui date de 2010.',
                'phone' => '0485652598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => null,
            ],
            [
                'applicant_login' => 'marie123',
                'title' => 'Installer Windows 10 sur mon nouveau pc',
                'address' => 'Rue du Boudrier 5',
                'locality_postal_code' => 1090,
                'price' => 10,50,
                'description' => 'J\'aimerais installer windows 10 sur mon nouvel ordinateur.',
                'phone' => '0485652598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => '2021-05-24 14:01:00',
            ],
            [
                'applicant_login' => 'john123',
                'title' => 'Casser la cloison dans ma cuisine',
                'address' => 'Boulevard de la Rue 65',
                'locality_postal_code' => 1090,
                'price' => 10,
                'description' => null,
                'phone' => '0485652598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => null,
            ],
        ];

        foreach ($announcements as $announcement) {
            $locality = Locality::firstWhere('postal_code', $announcement['locality_postal_code']);
            $user = User::firstWhere('login', $announcement['applicant_login']);

            DB::table('announcements')->insert([
                'applicant_user_id' => $user->id,
                'title' => $announcement['title'],
                'address' => $announcement['address'],
                'locality_id' => $locality->id,
                'price' => $announcement['price'],
                'description' => $announcement['description'],
                'phone' => $announcement['phone'],
                'created_at' => $announcement['created_at'],
                'realised_at' => $announcement['realised_at'],
            ]);
        }
    }
}
