<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news_msts', function (Blueprint $table) {
            if (! Schema::hasColumn('news_msts', 'is_indexed')) {
                $table->boolean('is_indexed')->default(false);
            }
            if (! Schema::hasColumn('news_msts', 'indexed_at')) {
                $table->timestamp('indexed_at')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('news_msts', function (Blueprint $table) {
            foreach (['indexed_at', 'is_indexed'] as $column) {
                if (Schema::hasColumn('news_msts', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
