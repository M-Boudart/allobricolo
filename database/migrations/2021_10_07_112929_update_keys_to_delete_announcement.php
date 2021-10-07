<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKeysToDeleteAnnouncement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('announcement_categories', function (Blueprint $table) {
            $table->dropForeign('announcement_categories_announcement_id_foreign');

            $table->foreign('announcement_id')
                    ->references('id')->on('announcements')
                    ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('announcement_pictures', function (Blueprint $table) {
            $table->dropForeign('announcement_pictures_announcement_id_foreign');

            $table->foreign('announcement_id')
                    ->references('id')->on('announcements')
                    ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('helpers', function (Blueprint $table) {
            $table->dropForeign('helpers_announcement_id_foreign');

            $table->foreign('announcement_id')
                    ->references('id')->on('announcements')
                    ->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign('reviews_announcement_id_foreign');

            $table->foreign('announcement_id')
                    ->references('id')->on('announcements')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('announcement_categories', function (Blueprint $table) {
            $table->dropForeign('announcement_categories_announcement_id_foreign');

            $table->foreign('announcement_id')
                    ->references('id')->on('announcements')
                    ->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::table('announcement_pictures', function (Blueprint $table) {
            $table->dropForeign('announcement_pictures_announcement_id_foreign');

            $table->foreign('announcement_id')
                    ->references('id')->on('announcements')
                    ->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::table('helpers', function (Blueprint $table) {
            $table->dropForeign('helpers_announcement_id_foreign');

            $table->foreign('announcement_id')
                    ->references('id')->on('announcements')
                    ->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign('reviews_announcement_id_foreign');

            $table->foreign('announcement_id')
                    ->references('id')->on('announcements')
                    ->onDelete('restrict')->onUpdate('cascade');
        });
    }
}
