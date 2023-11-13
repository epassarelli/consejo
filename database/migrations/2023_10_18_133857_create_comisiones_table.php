<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comisiones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('orden');
            $table->boolean('status');
            $table->unsignedBigInteger('usuarioAlta_id')->nullable();
            $table->unsignedBigInteger('usuarioModifica_id')->nullable();
            $table->unsignedBigInteger('usuarioBaja_id')->nullable();
            $table->dateTime('fechaBaja', $precision = 0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comisiones');
    }
};
