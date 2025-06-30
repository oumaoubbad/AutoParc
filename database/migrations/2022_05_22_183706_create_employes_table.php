<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string ("nom");
            $table->string ("prenom");
            $table->string('email')->unique();
            $table->string("adr")->nullable();
            $table->string ("tel");
            $table->string ("CIN");
            $table->string ("num_permis");
            $table->bigInteger("fonction_id") -> unsigned();
            $table->foreign("fonction_id")
             ->references("id")
             ->on("fonctions")
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
        Schema::dropIfExists('employes');
    }
}
