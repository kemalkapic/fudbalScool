<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('talent_id')->nullable();
            $table->string("uplatitelj");
            $table->string("opis");
            $table->double("iznos", 8, 2)->default(0);
            $table->date("datum");
            $table->string("status");
            $table->timestamps();

            $table->foreign('talent_id')->references('id')->on('talent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('kasa');
    }
}
