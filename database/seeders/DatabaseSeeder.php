<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LocalitiesTableSeeder::class,
            CategoriesTableSeeder::class,
            StatusTableSeeder::class,
            UsersTableSeeder::class,
            AnnouncementsTableSeeder::class,
            AnnouncementPicturesTableSeeder::class,
            ReviewsTableSeeder::class,
            AnnouncementCategoriesTableSeeder::class,
            KnowledgesTableSeeder::class,
            HelpersTableSeeder::class,
            ReportsTableSeeder::class,
            PunishmentsTableSeeder::class,
            PaymentsTableSeeder::class,
            ChMessagesTableSeeder::class,
        ]);
    }
}
