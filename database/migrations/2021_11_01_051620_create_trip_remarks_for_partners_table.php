<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripRemarksForPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_remarks_for_partners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tr_request_to_partner_id');
            $table->foreign('tr_request_to_partner_id')->nullable()->references('id')->on('trip_request_to_partners');
            $table->unsignedBigInteger('preset_remark_id');
            $table->foreign('preset_remark_id')->nullable()->references('id')->on('preset_remarks');
            $table->longText('remarks')->nullable();
            $table->integer('remarked_by')->nullable();
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
        Schema::dropIfExists('trip_remarks_for_partners');
    }
}
