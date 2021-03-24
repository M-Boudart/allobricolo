<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AnnouncementPicture;

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
                'announcement_id' => 2,
                'picture_url' => 'evier.jpg',
            ],
            [
                'announcement_id' => 2,
                'picture_url' => 'sdb.jpg',
            ],
            [
                'announcement_id' => 2,
                'picture_url' => 'douche.jpg',
            ],
            [
                'announcement_id' => 1,
                'picture_url' => 'ordinateur.jpg',
            ],
            [
                'announcement_id' => 3,
                'picture_url' => 'jardin.jpg',
            ],
            [
                'announcement_id' => 3,
                'picture_url' => 'arbre.jpg',
            ],
            [
                'announcement_id' => 5,
                'picture_url' => 'lumiere.jpg',
            ],
            [
                'announcement_id' => 6,
                'picture_url' => 'toiture.jpg',
            ],
        ];

        foreach ($announcementPictures as $announcementPicture) {
            DB::table('announcement_pictures')->insert([
                'announcement_id' => $announcementPicture['announcement_id'],
                'picture_url' => $announcementPicture['picture_url'],
            ]);
        }
    }
}
