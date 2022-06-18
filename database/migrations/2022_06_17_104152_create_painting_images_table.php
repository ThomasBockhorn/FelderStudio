<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('painting_images', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->bigInteger('painting_id')->unsigned();
            $table->timestamps();

            $table->foreign('painting_id')->references('id')->on('paintings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('painting_images');
    }
};
