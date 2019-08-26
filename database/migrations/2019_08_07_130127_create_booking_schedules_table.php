<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('roomtype_id');
            $table->unsignedBigInteger('booking_status_id')->default('2');
            $table->dateTime('date_in');
            $table->dateTime('date_out');
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('roomtype_id')->references('id')->on('room_types');
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
        Schema::dropIfExists('booking_schedules');
    }
}
