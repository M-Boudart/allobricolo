<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_user_id');
            $table->string('title', 100);
            $table->string('address', 60);
            $table->foreignId('locality_id');
            $table->float('price', 5, 2);
            $table->text('description')->nullable();
            $table->string('phone', 20);
            $table->dateTime('created_at');
            $table->dateTime('realised_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
