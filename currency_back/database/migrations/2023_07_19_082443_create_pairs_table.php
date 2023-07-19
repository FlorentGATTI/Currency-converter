<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairsTable extends Migration
{
    public function up()
    {
        Schema::create('pairs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('currency_from');
            $table->unsignedBigInteger('currency_to');
            $table->decimal('rate', 10, 2);
            $table->integer('conversion_count')->default(0);
            $table->timestamps();

            $table->foreign('currency_from')->references('id')->on('currencies');
            $table->foreign('currency_to')->references('id')->on('currencies');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pairs');
    }
}

