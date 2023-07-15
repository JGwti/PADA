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
        Schema::create('consents', function (Blueprint $table) {
            $table->id();
            $table->String ('professional_area');
            $table->integer ('day');
            $table->String ('mont');
            $table->integer('year');
            $table->String ('city');
            $table->String ('patient_signature');
            $table->String ('representative_signature')->nullable();
            $table->String ('representative_name')->nullable();
            $table->Integer ('representative_document_number')->nullable()->unique();
            $table->String ('representative_document_city')->nullable();
            $table->integer ('id_psychological');
            $table->integer ('id_psychopedagogical');
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
        Schema::dropIfExists('consents');
    }
};
