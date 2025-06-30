<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string("matricule")->unique();
            $table->string("ncg");
            $table->boolean("status")->default(1);
            $table->boolean("etat")->default(1);
            $table->string('image')->nullable();
            $table->string('kilo');

            
            $table->bigInteger("marque_id") -> unsigned();
            $table->foreign("marque_id")
             ->references("id")
             ->on("marques")
             ->onDelete("cascade");
            $table->bigInteger("modele_id") -> unsigned();
            $table->foreign("modele_id")
             ->references("id")
             ->on("modeles")
             ->onDelete("cascade");
            
            $table->timestamps();
            $table->bigInteger("tcarburant_id") -> unsigned();
            $table->foreign("tcarburant_id")
             ->references("id")
             ->on("tcarburants")
             ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voitures');
    }
}
