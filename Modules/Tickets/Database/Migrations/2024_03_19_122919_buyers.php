<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Buyers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('identification', 20)->nullable(); // Se asume que la identificación puede tener hasta 20 caracteres
            $table->string('phone', 15)->nullable(); // Se asume que el número de teléfono puede tener hasta 15 caracteres
            $table->string('email')->unique();
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
        Schema::dropIfExists('buyers');
    }
}
