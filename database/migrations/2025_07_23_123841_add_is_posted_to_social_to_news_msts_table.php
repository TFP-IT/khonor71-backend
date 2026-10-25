<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Helper to safely check if a column exists in MySQL
     */
    private function hasColumn(string $table, string $column): bool
    {
        try {
            $result = DB::select("SHOW COLUMNS FROM `{$table}` LIKE '{$column}'");
            return !empty($result);
        } catch (\Throwable $e) {
            return Schema::hasColumn($table, $column);
        }
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!$this->hasColumn('news_msts', 'is_auto_post')) {
            try {
                Schema::table('news_msts', function (Blueprint $table) {
                    $table->boolean('is_auto_post')->default(true)->after('reader_hit');
                });
            } catch (\Throwable $e) {
                if (!str_contains($e->getMessage(), '1060') && !str_contains($e->getMessage(), 'Duplicate column')) {
                    throw $e;
                }
            }
        }

        if (!$this->hasColumn('news_msts', 'is_posted_to_social')) {
            try {
                Schema::table('news_msts', function (Blueprint $table) {
                    $table->boolean('is_posted_to_social')->default(false)->after('is_auto_post');
                });
            } catch (\Throwable $e) {
                if (!str_contains($e->getMessage(), '1060') && !str_contains($e->getMessage(), 'Duplicate column')) {
                    throw $e;
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if ($this->hasColumn('news_msts', 'is_posted_to_social')) {
            try {
                Schema::table('news_msts', function (Blueprint $table) {
                    $table->dropColumn('is_posted_to_social');
                });
            } catch (\Throwable $e) {}
        }

        if ($this->hasColumn('news_msts', 'is_auto_post')) {
            try {
                Schema::table('news_msts', function (Blueprint $table) {
                    $table->dropColumn('is_auto_post');
                });
            } catch (\Throwable $e) {}
        }
    }
};
