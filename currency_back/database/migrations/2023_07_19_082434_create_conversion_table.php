<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversionTable extends Migration
{
    public function up()
    {
        Schema::create('conversion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('currency_from');
            $table->unsignedBigInteger('currency_to');
            $table->decimal('rate', 10, 2);
            $table->timestamps();

            $table->foreign('currency_from')->references('id')->on('currencies');
            $table->foreign('currency_to')->references('id')->on('currencies');
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversion');
    }
}

