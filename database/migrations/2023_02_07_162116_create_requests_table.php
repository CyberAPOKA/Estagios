<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Core\Constants\RequestStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departament_id');
            $table->string('level');
            $table->string('hiring_type');
            $table->string('secretary_phone');
            $table->string('responsible');
            $table->string('hiring_amount')->nullable();
            $table->string('trainee_name')->nullable();
            $table->longText('information');
            $table->enum('status', RequestStatus::values())->default(RequestStatus::REGISTERED);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('departament_id')->references('id')->on('departaments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
};
