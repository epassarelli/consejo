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
        Schema::create('presentes_sesion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sesion');
            $table->unsignedBigInteger('id_usuario');
            $table->binary('votante')->default(0);
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_sesion')->references('id')->on('sesiones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presente_sesions');
    }
};
