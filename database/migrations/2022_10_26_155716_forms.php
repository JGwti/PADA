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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referrals_id');
            $table->unsignedBigInteger('type_form_id');
            $table->timestamps();

            $table->foreign('referrals_id')->references('id')->on('student_referrals')->onDelete('cascade');
            $table->foreign('type_form_id')->references('id')->on('type_forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
};
