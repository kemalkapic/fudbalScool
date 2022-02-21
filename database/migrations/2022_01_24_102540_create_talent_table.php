<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talent', function (Blueprint $table) {
            $table->id();
            $table->string("prezime");
            $table->string("ime");
            $table->string("ime_roditelja");
            $table->date("datum_rodjenja");
            $table->date("start_treniranja")->nullable();
            $table->string("status");
            $table->string("telefon")->nullable();
            $table->string("email")->nullable();
            $table->string("broj_clanske_karte")->nullable();
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
        Schema::dropIfExists('talent');
    }
}
