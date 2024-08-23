<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('UPDATE users SET estado = 0 WHERE estado is null');

        Schema::table('users', function (Blueprint $table) {
            // Cambiar la columna 'estado' a boolean con default 1 y que no sea null
            $table->boolean('estado')->default(1)->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Si necesitas revertir el cambio, vuelve a tinyInteger
            $table->tinyInteger('estado')->nullable()->default(null)->change();
        });
    }
};
