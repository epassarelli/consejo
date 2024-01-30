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
        
        Schema::create('sesiones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->enum('consejo', ['V', 'F'])->default('V');
            $table->unsignedBigInteger('comision_id')->nullable();
            $table->foreign('comision_id')->references('id')->on('comisiones')->restrictOnDelete();
            $table->dateTime('fPublicada', $precision = 0)->nullable();
            $table->dateTime('fComunicacion', $precision = 0)->nullable();
            $table->dateTime('fFinalizada', $precision = 0)->nullable();
            $table->string('urlYoutube')->nullable();
            $table->string('pdf')->nullable();
            $table->integer('estado')->default(1);//estados: 1 = En revision, 2 = publicada, 3 = Cerrada
            $table->unsignedBigInteger('usuarioAlta_id')->nullable();
            $table->foreign('usuarioAlta_id')->references('id')->on('users')->restrictOnDelete();
            $table->unsignedBigInteger('usuarioModifico_id')->nullable();
            $table->foreign('usuarioModifico_id')->references('id')->on('users')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestion_sesiones');
    }
};
