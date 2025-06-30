<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministratifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administratifs', function (Blueprint $table) {
            $table->id();
            $table->date("assurance_debut");
            $table->date("assurance_expire_le");
            $table->bigInteger("voiture_id") -> unsigned();
            $table->foreign("voiture_id")
             ->references("id")
             ->on("voitures")
             ->onDelete("cascade");
             $table->date("effectue_le");
             $table->date("visite_expire_le");
             $table->date("vignet");
             $table->date("vignet_expire_le");
         
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
        Schema::dropIfExists('administratifs');
    }
}
