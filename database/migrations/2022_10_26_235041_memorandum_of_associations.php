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
        Schema::create('memorandum_of_associations', function (Blueprint $table) {
            $table->id();
            $table->String ('patient_signature');
            $table->integer ('id_psychological');
            $table->integer ('id_psychopedagogical');
            $table->integer('day');
            $table->String('mont');
            $table->integer('year');
            $table->rememberToken();
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
        Schema::dropIfExists('memorandum_of_associations');
    }
};
