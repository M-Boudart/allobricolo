<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;

class KnowledgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('knowledges')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $knowledges = [
            [
                'user_login' => 'bob123',
                'category_name' => 'Plomberie',
            ],
            [
                'user_login' => 'john123',
                'category_name' => 'Electricité',
            ],
            [
                'user_login' => 'marie123',
                'category_name' => 'Informatique',
            ],
            [
                'user_login' => 'john123',
                'category_name' => 'Informatique',
            ],
            [
                'user_login' => 'pierre123',
                'category_name' => 'Plomberie',
            ],
            [
                'user_login' => 'pierre123',
                'category_name' => 'Jardinage',
            ],
            [
                'user_login' => 'pierre123',
                'category_name' => 'Electricité',
            ],
            [
                'user_login' => 'pierre123',
                'category_name' => 'Informatique',
            ],
            [
                'user_login' => 'alain123',
                'category_name' => 'Plomberie',
            ],
        ];

        foreach ($knowledges as $knowledge) {
            $user = User::firstWhere('login', $knowledge['user_login']);
            $category = Category::firstWhere('category', $knowledge['category_name']);

            DB::table('knowledges')->insert([
                'user_id' => $user->id,
                'category_id' => $category->id,
            ]);
        }
    }
}
