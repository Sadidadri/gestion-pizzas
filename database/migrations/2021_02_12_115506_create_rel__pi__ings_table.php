<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelPiIngsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__pi__ings', function (Blueprint $table) {
            $table->id();
            //Claves foráneas
            $table->bigInteger('id_pizza')->unsigned();            
            $table->foreign('id_pizza')->references('id')->on('pizzas')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_ingrediente')->unsigned();            
            $table->foreign('id_ingrediente')->references('id')->on('ingredientes')->onDelete('cascade')->onUpdate('cascade');
            //Otros atributos
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel__pi__ings');
    }
}
