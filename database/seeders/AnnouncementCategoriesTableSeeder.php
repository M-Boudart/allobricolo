<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Announcement;

class AnnouncementCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announcementCategories = [
            [   
                'announcement_id' => 3,
                'category_name' => 'Plomberie',
            ],
            [   
                'announcement_id' => 2,
                'category_name' => 'Plomberie',
            ],
            [   
                'announcement_id' => 2,
                'category_name' => 'Menuiserie',
            ],
            [   
                'announcement_id' => 2,
                'category_name' => 'Electricité',
            ],
            [   
                'announcement_id' => 3,
                'category_name' => 'Jardinage',
            ],
            [   
                'announcement_id' => 4,
                'category_name' => 'Plomberie',
            ],
            [   
                'announcement_id' => 5,
                'category_name' => 'Informatique',
            ],
            [   
                'announcement_id' => 6,
                'category_name' => 'Electricité',
            ],
        ];

        foreach ($announcementCategories as $announcementCategory) {
            $announcement = Announcement::firstWhere('id', $announcementCategory['announcement_id']);
            $category = Category::firstWhere('category', $announcementCategory['category_name']);

            DB::table('announcement_categories')->insert([
                'announcement_id' => $announcement->id,
                'category_id' => $category->id,
            ]);
        }
    }
}
