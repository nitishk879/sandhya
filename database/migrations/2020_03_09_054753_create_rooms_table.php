<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('overview')->nullable();
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->unsignedInteger('hotel_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('type_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->softDeletes();
        });

        Schema::create('room_amenities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('overview');
            $table->timestamps();

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
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('room_amenities');
    }
}
