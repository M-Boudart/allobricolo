<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['pending', 'moderated']);
            $table->enum('type', ['announcement', 'profile', 'review']);
            $table->unsignedBigInteger('object_id');
            $table->foreignId('object_author');
            $table->foreignId('reported_by');
            $table->text('description');
            $table->date('reported_at');

            $table->foreign('reported_by')
                    ->references('id')->on('users')
                    ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('object_author')
                    ->references('id')->on('users')
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
        Schema::dropIfExists('reports');
    }
}
