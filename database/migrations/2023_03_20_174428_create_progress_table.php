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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('admin_id')->onDelete('cascade');
            $table->unsignedBigInteger('request_id')->onDelete('cascade');
            // $table->unsignedBigInteger('user_id')->onDelete('cascade')->nullable();
            $table->longText('observation')->nullable();

            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('request_id')->references('id')->on('requests');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress');
    }
};
