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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

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
            [
                'category' => 'Peinture',
            ],
            [
                'category' => 'Electroménager',
            ],
            [
                'category' => 'Décoration',
            ],
            [
                'category' => 'Homme à tout faire',
            ],
            [
                'category' => 'Maçonnerie',
            ],
            [
                'category' => 'Autre',
            ],
        ];

            DB::table('categories')->insert(
                $categories,
            );
    }
}
