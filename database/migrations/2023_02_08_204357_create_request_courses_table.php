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
        Schema::create('request_courses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id')->onDelete('cascade');
            $table->unsignedBigInteger('request_id')->onDelete('cascade');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('request_id')->references('id')->on('requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_courses');
    }
};
