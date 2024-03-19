<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->datetime('date')->nullable();
            $table->string('name',60)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('description',254)->nullable();
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
        Schema::dropIfExists('events');
    }
}
