<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact_number');
            $table->string('email');
            $table->string('address');
            $table->integer('adult');
            $table->integer('children');
            $table->unsignedBigInteger('room_id')->nullable();
            $table->dateTime('date_in');
            $table->dateTime('date_out');
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('booking_status_id')->default('2');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('booking_status_id')->references('id')->on('booking_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
