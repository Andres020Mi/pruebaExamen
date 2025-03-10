<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique(); // Código del artículo
            $table->string('articulo'); // Nombre del artículo
            $table->enum('unidades_de_medidas', ['ml', 'kg', 'g', 'l', 'unidad'])->nullable(); // Unidad de medida opcional
            $table->integer('cantidad_de_unidad')->default(0);
            $table->integer('cantidad')->default(0); // Cantidad disponible
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
        Schema::dropIfExists('stocks');
    }
}
