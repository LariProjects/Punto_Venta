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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->string('rfc', 20)->primary();
            $table->string('nombre', 20);
            $table->string('calle', 45);
            $table->string('numero', 20);
            $table->string('pag_web', 100)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
