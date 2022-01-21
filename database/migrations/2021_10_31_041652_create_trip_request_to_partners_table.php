<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripRequestToPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_request_to_partners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_request_id');
            $table->foreign('trip_request_id')->references('id')->on('trip_requests');
            $table->unsignedBigInteger('trip_types_id');
            $table->foreign('trip_types_id')->references('id')->on('trip_types');
            $table->unsignedBigInteger('partner_id');
            $table->foreign('partner_id')->references('id')->on('users');
            $table->decimal('price',8,2);
            $table->decimal('trip_per_price',8,2);
            $table->decimal('bonus',8,2);
            $table->decimal('distance',8,2);
            $table->integer('working_days');
            $table->string('week_days');
            $table->string('route_name');
            $table->enum('status',['Interested', 'Confirmed','Assigned']);
            $table->longText('instruction_for_tm');
            $table->longText('instruction_for_sp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_request_to_partners');
    }
}
