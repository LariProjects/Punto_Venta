<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('compra_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('COMPRA_id');
            $table->unsignedBigInteger('PRODUCTO_id');
            $table->float('monto_total');
            $table->integer('cant_comprada');
            $table->foreign('COMPRA_id')->references('id')->on('compras')->onDelete('cascade');
            $table->foreign('PRODUCTO_id')->references('id')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_productos');
    }
};
