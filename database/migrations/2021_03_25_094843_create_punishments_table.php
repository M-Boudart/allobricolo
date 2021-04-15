<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punishments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('reported_by');
            $table->enum('type', ['suspended', 'banned']);
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->foreignId('reason');

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('reported_by')
                    ->references('id')->on('users')
                    ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('reason')
                ->references('id')->on('reports')
                ->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('punishments');
    }
}
