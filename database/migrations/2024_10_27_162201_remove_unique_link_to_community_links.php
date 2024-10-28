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
        Schema::table('community_links', function (Blueprint $table) {
            $table->dropUnique('community_links_link_unique'); // Quita la restricción unique
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('community_links', function (Blueprint $table) {
            $table->unique('link'); // Restaura la restricción unique
        });
    }
};
