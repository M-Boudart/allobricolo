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
            $table->foreignId('id')->autoIncrement()->unique();
            $table->foreignId('applicant_user_id');
            $table->string('title', 100);
            $table->string('address', 60);
            $table->foreignId('locality_id');
            $table->float('price', 5, 2);
            $table->text('description')->nullable();
            $table->string('phone', 20);
            $table->dateTime('created_at');
            $table->dateTime('realised_at')->nullable();

            $table->foreign('applicant_user_id')
                    ->references('id')->on('users')
                    ->onDelete('restrict')->onUpdate('cascade');
            
            $table->foreign('locality_id')
                    ->references('id')->on('localities')
                    ->onDelete('restrict')->onUpdate('cascade');
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
