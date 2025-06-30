<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparations', function (Blueprint $table) {
            $table->id();
            $table->date("date_debut");
            $table->text ("note");
            $table->date("date_fin");
            $table->decimal("prix",8,2);
            $table->bigInteger("voiture_id") -> unsigned();
            $table->foreign("voiture_id")
             ->references("id")
             ->on("voitures")
             ->onDelete("cascade");
            $table->bigInteger("treparation_id") -> unsigned();
            $table->foreign("treparation_id")
             ->references("id")
             ->on("treparations")
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
        Schema::dropIfExists('reparations');
    }
}
