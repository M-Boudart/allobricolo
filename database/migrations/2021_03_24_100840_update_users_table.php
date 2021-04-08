<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('login', 30)->unique();
            $table->string('firstname', 60);
            $table->string('lastname', 60);
            $table->text('description')->nullable();
            $table->text('picture_url', 255)->nullable();
            $table->foreignId('status_id');

            $table->foreign('status_id')
                    ->references('id')->on('status')
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
        Schema::dropIfExists('users');
    }
}
