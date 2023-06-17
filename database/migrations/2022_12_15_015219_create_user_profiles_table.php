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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('name');
            $table->string('social_name');
            $table->string('cpf')->unique();
            $table->string('rg');
            $table->string('birth_date');
            $table->string('home_phone')->nullable();
            $table->string('cell_phone');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('deficiency')->nullable();
            $table->string('race');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
};
