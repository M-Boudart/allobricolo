<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AnnouncementPicture;
use App\Models\Announcement;

class AnnouncementPicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        AnnouncementPicture::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $announcementPictures = [
            [
                'announcement_id' => 1,
                'picture_url' => 'douche.jpeg',
            ],
            [
                'announcement_id' => 2,
                'picture_url' => 'evier.jpg',
            ],
            [
                'announcement_id' => 3,
                'picture_url' => 'jardin.jpg',
            ],
            [
                'announcement_id' => 5,
                'picture_url' => 'ordinateur.jpeg',
            ],
            [
                'announcement_id' => 6,
                'picture_url' => 'maison.jpg',
            ],
            [
                'announcement_id' => 7,
                'picture_url' => 'meuble.jpg',
            ],
            [
                'announcement_id' => 9,
                'picture_url' => 'annonce-sexe.jpg',
            ],
        ];

        foreach ($announcementPictures as &$announcementPicture) {
            $announcement = Announcement::firstWhere('id', $announcementPicture['announcement_id']);

            $announcementPicture['announcement_id'] = $announcement->id; 
        }

        DB::table('announcement_pictures')->insert(
            $announcementPictures
        );
    }
}
