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
        Schema::create('case_closures', function (Blueprint $table) {
            $table->id();
            $table->date ('end_session');
            $table->String ('professional_area');
            $table->integer ('number_sessions');
            $table->String ('found_situations');
            $table->String ('process_description');
            $table->String ('progress_issues');
            $table->String ('observations');
            $table->integer ('id_professional');
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
        Schema::dropIfExists('case_closures');
    }
};
