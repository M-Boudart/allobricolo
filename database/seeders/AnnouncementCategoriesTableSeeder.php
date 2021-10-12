<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class AnnouncementCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('announcement_categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $announcementCategories = [
            [   
                'announcement_id' => 1,
                'category_name' => 'Plomberie',
            ],
            [   
                'announcement_id' => 2,
                'category_name' => 'Plomberie',
            ],
            [   
                'announcement_id' => 3,
                'category_name' => 'Jardinage',
            ],
            [   
                'announcement_id' => 4,
                'category_name' => 'Peinture',
            ],
            [   
                'announcement_id' => 5,
                'category_name' => 'Informatique',
            ],
            [   
                'announcement_id' => 6,
                'category_name' => 'Plomberie',
            ],
            [   
                'announcement_id' => 6,
                'category_name' => 'Electricité',
            ],
            [   
                'announcement_id' => 6,
                'category_name' => 'Menuiserie',
            ],
            [   
                'announcement_id' => 7,
                'category_name' => 'Homme à tout faire',
            ],
            [   
                'announcement_id' => 8,
                'category_name' => 'Jardinage',
            ],
            [   
                'announcement_id' => 57,
                'category_name' => 'Peinture',
            ],
            [   
                'announcement_id' => 57,
                'category_name' => 'Electroménager',
            ],
            [   
                'announcement_id' => 57,
                'category_name' => 'Homme à tout faire',
            ],
        ];

        for ($i = 9; $i < 15; $i++) {
            $announcementCategories[] =[   
                    'announcement_id' => $i,
                    'category_name' => 'Jardinage',
            ];
            $announcementCategories[] =[   
                    'announcement_id' => $i,
                    'category_name' => 'Plomberie',
            ];
        }

        for ($i = 15; $i < 23; $i++) {
            $announcementCategories[] =[   
                'announcement_id' => $i,
                'category_name' => 'Peinture',
            ];
            $announcementCategories[] =[   
                'announcement_id' => $i,
                'category_name' => 'Décoration',
            ];
        }

        for ($i = 23; $i < 32; $i++) {
            $announcementCategories[] =[   
                'announcement_id' => $i,
                'category_name' => 'Menuiserie',
            ];
        }

        for ($i = 32; $i < 40; $i++) {
            $announcementCategories[] =[   
                'announcement_id' => $i,
                'category_name' => 'Autre',
            ];
        }

        for ($i = 40; $i < 45; $i++) {
            $announcementCategories[] =[   
                'announcement_id' => $i,
                'category_name' => 'Homme à tout faire',
            ];
        }

        for ($i = 45; $i < 51; $i++) {
            $announcementCategories[] =[   
                'announcement_id' => $i,
                'category_name' => 'Plomberie',
            ];
        }

        for ($i = 51; $i < 56; $i++) {
            $announcementCategories[] =[   
                'announcement_id' => $i,
                'category_name' => 'Electricité',
            ];
        }

        foreach ($announcementCategories as &$announcementCategory) {
            $category = Category::firstWhere('category', $announcementCategory['category_name']);

            $announcementCategory['category_id'] = $category->id;
            unset($announcementCategory['category_name']);
        }

        DB::table('announcement_categories')->insert(
            $announcementCategories
        );
    }
}
