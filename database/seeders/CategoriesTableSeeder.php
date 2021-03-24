<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'category' => 'Electricité',
            ],
            [
                'category' => 'Menuiserie',
            ],
            [
                'category' => 'Plomberie',
            ],
            [
                'category' => 'Informatique',
            ],
            [
                'category' => 'Jardinage',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'category' => $category['category'],
            ]);
        }
    }
}
