<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('roomtype_id')->default(1);
            $table->integer('number');
            $table->integer('price');
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

            $table->foreign('roomtype_id')->references('id')->on('room_types');
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
    }
}
