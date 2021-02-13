<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelPePizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__pe__pizs', function (Blueprint $table) {
            $table->id();
            //Claves foráneas de pedido y pizza:
            $table->bigInteger('id_pedido')->unsigned();            
            $table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_pizza')->unsigned();            
            $table->foreign('id_pizza')->references('id')->on('pizzas')->onDelete('cascade')->onUpdate('cascade');
            //Otros atributos
            $table->bigInteger('cantidad');
            $table->string('tamagno');
            $table->string('tipo_masa',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel__pe__pizs');
    }
}
