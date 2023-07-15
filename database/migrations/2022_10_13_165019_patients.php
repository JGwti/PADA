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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('document_number')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->integer('age');
            $table->date('date_birth');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();

            $table->unsignedBigInteger('document_type_id');
            $table->unsignedBigInteger('patient_type_id');
            $table->unsignedBigInteger('gender_type_id');
            $table->unsignedBigInteger('academic_program_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('eps_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('countrie_id');
            $table->unsignedBigInteger('citie_id');

            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->foreign('patient_type_id')->references('id')->on('patient_types');
            $table->foreign('gender_type_id')->references('id')->on('gender_types');
            $table->foreign('academic_program_id')->references('id')->on('academic_programs');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('eps_id')->references('id')->on('eps');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('countrie_id')->references('id')->on('countries');
            $table->foreign('citie_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
