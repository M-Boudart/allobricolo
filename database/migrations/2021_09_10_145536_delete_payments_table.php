<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeletePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('payments');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('announcement_id');
            $table->string('payment_id', 255)->unique();
            $table->dateTime('payed_at')->nullable();
            $table->enum('status', ['pending', 'payed', 'problem']);

            $table->foreign('announcement_id')
                    ->references('id')->on('announcements')
                    ->onDelete('restrict')->onUpdate('cascade');
        });
    }
}
