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
        Schema::create('initial_psychological_assessments', function (Blueprint $table) {
            $table->id();
            $table->String('accept_conditions');
            $table->date('creation_date');
            $table->String ('patients_laterality');//////// lateralidad?
            $table->String ('marital_status');
            $table->String ('family_name');
            $table->String ('family_relationship');
            $table->String ('family_phone')->unique();
            $table->String ('reason_consultation');
            $table->String ('overall_story');
            $table->String ('family_topic');
            $table->String ('social_topic');
            $table->String ('academic_topic');
            $table->String ('personal_topic');
            $table->String ('personal_history');
            $table->String ('family_history');
            $table->String ('healthy_state');
            $table->String ('general_observation');
            $table->integer ('id_psychological');
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
        Schema::dropIfExists('initial_psychological_assessments');
    }
};
