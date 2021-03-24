<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('announcement_id');
            $table->foreignId('helper_id');
            $table->enum('status', ['selected', 'pending', 'not selected']);
            $table->foreignId('chat_id');

            $table->foreign('announcement_id')
                    ->references('id')->on('announcements')
                    ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('helper_id')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('helpers');
    }
}
