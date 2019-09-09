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
            $table->unsignedBigInteger('room_type_id')->nullable();
            $table->dateTime('date_in');
            $table->dateTime('date_out');
            $table->string('special_request')->nullable();
            $table->unsignedBigInteger('booking_status_id')->default('1');
            $table->string('extText1')->nullable();
            $table->string('extText2')->nullable();
            $table->string('extText3')->nullable();
            $table->string('extNo1')->nullable();
            $table->string('extNo2')->nullable();
            $table->string('extNo3')->nullable();
            $table->dateTime('extDate1')->nullable();
            $table->dateTime('extDate2')->nullable();
            $table->dateTime('extDate3')->nullable();
            $table->longText('memo')->nullable();
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('room_type_id')->references('id')->on('room_types');
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
