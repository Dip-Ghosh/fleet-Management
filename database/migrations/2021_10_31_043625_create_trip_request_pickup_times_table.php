<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripRequestPickupTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_request_pickup_times', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->string('type');
            $table->unsignedBigInteger('trip_request_id');
            $table->foreign('trip_request_id')->nullable()->references('id')->on('trip_requests');
            $table->unsignedBigInteger('tr_request_to_partner_id');
            $table->foreign('tr_request_to_partner_id')->nullable()->references('id')->on('trip_request_to_partners');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_request_pickup_times');
    }
}
