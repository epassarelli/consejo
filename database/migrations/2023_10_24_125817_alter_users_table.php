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
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->after('name')->nullable();
            $table->string('phone')->after('email')->nullable();
            $table->unsignedBigInteger('cargo_id')->after('phone')->nullable();
            $table->foreign('cargo_id')->references('id')->on('cargos')->restrictOnDelete();
            $table->unsignedBigInteger('facultad_id')->after('cargo_id')->nullable();
            $table->foreign('facultad_id')->references('id')->on('facultades')->restrictOnDelete();
            $table->enum('web', ['V', 'F'])->after('password')->nullable();
            $table->unsignedTinyInteger('orden')->nullable();
            $table->unsignedBigInteger('usuarioAlta_id');
            $table->unsignedBigInteger('usuarioModifica_id')->nullable();
            $table->unsignedBigInteger('usuarioBaja_id')->nullable();
            $table->dateTime('fechaBaja', $precision = 0)->nullable();
            $table->boolean('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
