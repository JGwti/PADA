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
        Schema::create('student_referrals', function (Blueprint $table) {
            $table->id();
            $table->date ('remission_date');
            $table->String ('remission_to');
            $table->String ('reason_referral');
            $table->String ('accompanying_strategies');
            $table->String ('observations');
            $table->timestamps();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_id');

            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_referrals');
    }
};
