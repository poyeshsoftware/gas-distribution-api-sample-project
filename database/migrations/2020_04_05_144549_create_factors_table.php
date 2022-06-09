<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description', 500)->nullable()->default(null);
            $table->bigInteger('user_id')->unsigned()->index();
            $table->dateTime('date')->useCurrent();
            $table->decimal('price', 13, 2);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factors');
    }
}
