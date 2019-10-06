<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserShipmentIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shipment_ids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->double('shipment_id');
            $table->string('shipment_date');
            $table->string('shipment_type');
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
        Schema::dropIfExists('user_shipment_ids');
    }
}
