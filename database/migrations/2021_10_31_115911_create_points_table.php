<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_request_id');
            $table->foreign('trip_request_id')->nullable()->references('id')->on('trip_requests');
            $table->unsignedBigInteger('tr_request_to_partner_id');
            $table->foreign('tr_request_to_partner_id')->nullable()->references('id')->on('trip_request_to_partners');
            $table->string('name')->nullable();
            $table->decimal('latitude',5,2)->nullable();
            $table->decimal('longitude',5,2)->nullable();
            $table->enum('type',['PickUp', 'DropOff'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
