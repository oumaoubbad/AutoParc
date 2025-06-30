<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traites', function (Blueprint $table) {
            $table->id();
            $table->integer("mois_reste");
            $table->integer("jour_traite");
            $table->date("date_achat")->nullable();
            $table->decimal("prix_achat",8,2);
            $table->decimal("montant_avance",8,2);
            $table->bigInteger("voiture_id") -> unsigned();
            $table->foreign("voiture_id")
             ->references("id")
             ->on("voitures")
             ->onDelete("cascade");
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
        Schema::dropIfExists('traites');
    }
}
