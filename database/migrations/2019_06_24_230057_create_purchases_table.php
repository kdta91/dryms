<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_id');
            $table->string('origin');
            $table->string('description');
            $table->string('price');
            $table->dateTime('date');
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

            $table->foreign('booking_id')->references('id')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
