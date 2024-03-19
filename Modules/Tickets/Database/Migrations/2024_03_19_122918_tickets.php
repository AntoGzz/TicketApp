<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->unsignedBigInteger('event_id');
            $table->integer('quantity_sold')->nullable();
            $table->string('payment_file')->nullable();
            $table->unsignedBigInteger('buyer_id');
            // Campos Estandar
            $table->unsignedInteger('user_created_id');
            $table->timestamp('created_at')->nullable();
            $table->unsignedInteger('user_updated_id')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedInteger('user_deleted_id')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
