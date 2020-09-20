<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('comment')->nullable();
            $table->integer('adult');
            $table->integer('child');
            $table->integer('price');
            $table->float('advance')->nullable();
            $table->dateTime('booked_from');
            $table->dateTime('booked_upto');
            $table->string('booked')->default(0);
            $table->unsignedInteger('room_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->ipAddress('ip');
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
        Schema::dropIfExists('room_bookings');
    }
}
