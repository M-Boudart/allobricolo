<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_id');
            $table->index('chat_id');
            $table->foreignId('sender');
            $table->text('message');
            $table->dateTime('written_at');
            $table->enum('status', ['seen', 'not seen']);

            $table->foreign('chat_id')
                    ->references('chat_id')->on('helpers')
                    ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('sender')
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
        Schema::dropIfExists('chat_messages');
    }
}
