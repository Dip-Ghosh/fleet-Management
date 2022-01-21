<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('city')->nullable();
            $table->string('reference')->nullable();
            $table->enum('partner_type',['Person','Fleet Owner'])->nullable();

            $table->enum('type',['Personal','Company'])->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_location')->nullable();

            $table->string('garage_location')->nullable();
            $table->string('drop_location')->nullable();
            $table->enum('is_owner',['Yes','No'])->nullable();
            $table->enum('is_driven_by',['Self-Driven','Driver-Driven'])->nullable();
            $table->enum('is_ride_sharing_service_included',['Yes','No'])->nullable();

            $table->string('owner_national_id')->nullable();
            $table->string('owner_profile_picture')->nullable();
            $table->string('owner_tin_certificate')->nullable();
            $table->integer('number_of_car')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
