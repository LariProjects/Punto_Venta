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
        Schema::create('venta_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('VENTA_id');
            $table->unsignedBigInteger('PRODUCTO_id');
            $table->float('monto_total');
            $table->integer('cant_vendida');
            $table->foreign('VENTA_id')->references('id')->on('ventas')->onDelete('cascade');
            $table->foreign('PRODUCTO_id')->references('id')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_productos');
    }
};
