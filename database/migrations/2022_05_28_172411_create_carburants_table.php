<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarburantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carburants', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->string('kilom');
            $table->decimal("litre",8,2);
            $table->text ("note");
            $table->decimal("prix",8,2);
            $table->bigInteger("voiture_id") -> unsigned();
            $table->foreign("voiture_id")
             ->references("id")
             ->on("voitures")
             ->onDelete("cascade");
            $table->bigInteger("tcarburant_id") -> unsigned();
            $table->foreign("tcarburant_id")
             ->references("id")
             ->on("tcarburants")
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
        Schema::dropIfExists('carburants');
    }
}
