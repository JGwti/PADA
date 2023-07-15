<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impact_measurement_instruments', function (Blueprint $table) {
            $table->id();
            $table->String ('item_one');
            $table->String ('item_two');
            $table->String ('item_three');
            $table->String ('item_four');
            $table->String ('item_five');
            $table->String ('item_six');
            $table->String ('program_strengths');
            $table->String ('improvements_program');
            $table->timestamps();
            $table->unsignedBigInteger('form_id');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impact_measurement_instruments');
    }
};
