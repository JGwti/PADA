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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->Integer('document_number')->unique();
            $table->string('avatar')->default('default');;
            $table->string('signature_professional')->default('default');;
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('user_type_id');
            $table->unsignedBigInteger('document_type_id');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->foreign('user_type_id')->references('id')->on('users_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
