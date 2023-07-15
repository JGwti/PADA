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
        Schema::create('initial_psychopedagogical_assessments', function (Blueprint $table) {
            $table->id();
            $table->String('accept_conditions');
            $table->String ('emergency_contact_name');
            $table->integer ('emergency_contact')->unique();
            $table->integer ('years_beginning_education');
            $table->String ('elementary_school_description');
            $table->String ('middle_school_description');
            $table->String ('high_school_description');
            $table->integer ('finished_high_school');
            $table->integer ('admission_university');
            $table->String ('significant_experiences');
            $table->String ('dropped_out_program');
            $table->String ('how_many_times');
            $table->String ('reasons');
            $table->String ('reasons_choose_program');
            $table->String ('approved_semesters');
            $table->String ('missed_subjects');
            $table->String ('reason_consultation');
            $table->float ('accumulated_average');
            $table->String ('diseases_surgeries');//// enfermedades cirugias
            $table->String ('allergies');
            $table->String ('medicines');
            $table->String ('family_topic');
            $table->String ('aspect_single');
            $table->String ('strengths');
            $table->String ('aspects_improve');
            $table->String ('social_aspect');
            $table->String ('goals');
            $table->String ('future_forecast');
            $table->String ('difficulty_understanding');
            $table->String ('difficulty_expressing');
            $table->String ('difficulty_pronounce');
            $table->String ('difficulty_memorizing');
            $table->String ('voice_tone');
            $table->String ('difficulty_reading');
            $table->String ('reading_omits');
            $table->String ('Identify_basic_notions');
            $table->String ('difficulty_subjects');
            $table->String ('invert_numbers');
            $table->String ('difficulty_solving_problems');
            $table->String ('general_remarks');
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
        Schema::dropIfExists('initial_psychopedagogical_assessments');
    }
};
