<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_requests', function (Blueprint $table) {
            $table->id();
            $table->string('route_name')->nullable();
            $table->decimal('distance',8,2)->nullable();
            $table->integer('working_days')->nullable();
            $table->string('week_days')->nullable();
            $table->decimal('price',8,2)->nullable();
            $table->decimal('trip_per_price',8,2)->nullable();
            $table->decimal('bonus',8,2)->nullable();
            $table->enum('status',['Published', 'Unpublished','Closed'])->nullable();
            $table->longText('instruction_for_tm')->nullable();
            $table->longText('instruction_for_sp')->nullable();
            
            $table->softDeletes();
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
        Schema::dropIfExists('trip_requests');
    }
}
