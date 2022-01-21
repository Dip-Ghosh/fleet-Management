<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('car_type')->nullable();
            $table->string('car_brand')->nullable();
            $table->string('car_model')->nullable();
            $table->string('car_color')->nullable();
            $table->string('license_plate_number')->nullable();

            $table->string('registration_number')->nullable();
            $table->string('fitness_certificate')->nullable();
            $table->string('tax_token')->nullable();
            $table->string('insurance_paper')->nullable();
            $table->string('car_image')->nullable();
            $table->string('interest_in_rental_service')->nullable();

            $table->string('national_id')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('profile_picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
