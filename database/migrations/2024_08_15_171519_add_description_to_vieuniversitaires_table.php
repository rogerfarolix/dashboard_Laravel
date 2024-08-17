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
        Schema::table('vieuniversitaires', function (Blueprint $table) {
            $table->text('description')->nullable()->after('image'); // Ajoute la colonne description après la colonne image
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vieuniversitaires', function (Blueprint $table) {
            //
        });
    }
};
