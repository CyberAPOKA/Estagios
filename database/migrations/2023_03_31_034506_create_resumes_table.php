<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Core\Constants\SelectedStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->onDelete('cascade');
            $table->unsignedBigInteger('request_id')->onDelete('cascade');
            $table->longText('observation')->nullable();
            $table->enum('selected', SelectedStatus::values())->default(SelectedStatus::NO);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('resumes');
    }
};
