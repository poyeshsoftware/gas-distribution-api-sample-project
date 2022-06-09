<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactorImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factor_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('factor_id')->unsigned()->index()->nullable()->default(null);;
            $table->string('name');
            $table->timestamps();

            $table->foreign('factor_id')->references('id')
                ->on('factors')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factor_images');
    }
}
