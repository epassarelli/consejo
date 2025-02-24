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
        Schema::table('items_temario', function (Blueprint $table) {
            $table->integer('orden')->after('id_temario')->default(0); // Agrega la columna después de 'id_temario'
        });
        DB::table('items_temario')->update(['orden' => 1]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items_temario', function (Blueprint $table) {
            $table->dropColumn('orden');
        });
    }
};
