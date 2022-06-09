<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactorVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factor_vehicle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('factor_id');
            $table->unsignedBigInteger('vehicle_id');

            $table->foreign('factor_id')->references('id')->on('factors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factor_vehicle');
    }
}
