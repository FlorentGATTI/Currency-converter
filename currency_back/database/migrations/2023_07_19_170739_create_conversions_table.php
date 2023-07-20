<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversionsTable extends Migration
{
    public function up()
    {
        Schema::create('conversions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pair_id'); // Ajout de la colonne pair_id
            $table->integer('count'); // Ajout de la colonne count
            $table->timestamps();
            
            $table->foreign('pair_id')->references('id')->on('pairs'); // Clé étrangère vers la table pairs
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversions');
    }
}