<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id');
            $table->foreign('partner_id')->nullable()->references('id')->on('users');
            $table->string('called_by')->nullable();
            $table->unsignedBigInteger('tr_request_to_partner_id');
            $table->foreign('tr_request_to_partner_id')->nullable()->references('id')->on('trip_request_to_partners');
            $table->unsignedBigInteger('call_notes_id');
            $table->foreign('call_notes_id')->nullable()->references('id')->on('call_notes');
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
        Schema::dropIfExists('call_details');
    }
}
