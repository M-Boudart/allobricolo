<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'applicant_user_id' => 3,
                'title' => 'Changer ma douche',
                'address' => 'Boulevard de la Rue 65',
                'locality_id' => 1,
                'price' => 20,
                'description' => 'Je dois changer ma douche qui date de 2010.',
                'phone' => '0485652598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => null,
            ],
            [
                'applicant_user_id' => 5,
                'title' => 'Refaire toute ma cuisine',
                'address' => 'Boulevard du Midi 54',
                'locality_id' => 2,
                'price' => 250,
                'description' => null,
                'phone' => '0445256598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => '2021-10-24 14:00:00',
            ],
            [
                'applicant_user_id' => 1,
                'title' => 'Tailler un arbe dans mon jardin',
                'address' => 'Avenue des Volontaires 154',
                'locality_id' => 3,
                'price' => 20,
                'description' => 'Tailler un vieu boulleau datant du 15ème siècle',
                'phone' => '0444525265',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => null,
            ],
            [
                'applicant_user_id' => 2,
                'title' => 'Changer ma douche',
                'address' => 'Boulevard de la Rue 65',
                'locality_id' => 1,
                'price' => 20,
                'description' => 'Je dois changer ma douche qui date de 2010.',
                'phone' => '0485652598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => null,
            ],
            [
                'applicant_user_id' => 2,
                'title' => 'Installer Windows 10 sur mon nouveau pc',
                'address' => 'Rue du Boudrier 5',
                'locality_id' => 4,
                'price' => 10,50,
                'description' => 'J\'aimerais installer windows 10 sur mon nouvel ordinateur.',
                'phone' => '0485652598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => '2021-05-24 14:01:00',
            ],
            [
                'applicant_user_id' => 2,
                'title' => 'Casser la cloison dans ma cuisine',
                'address' => 'Boulevard de la Rue 65',
                'locality_id' => 1,
                'price' => 10,
                'description' => null,
                'phone' => '0485652598',
                'created_at' => '2021-03-24 14:01:45',
                'realised_at' => null,
            ],
        ];

        foreach ($announcements as $announcement) {
            DB::table('announcements')->insert([
                'applicant_user_id' => $announcement['applicant_user_id'],
                'title' => $announcement['title'],
                'address' => $announcement['address'],
                'locality_id' => $announcement['locality_id'],
                'price' => $announcement['price'],
                'description' => $announcement['description'],
                'phone' => $announcement['phone'],
                'created_at' => $announcement['created_at'],
                'realised_at' => $announcement['realised_at'],
            ]);
        }
    }
}
