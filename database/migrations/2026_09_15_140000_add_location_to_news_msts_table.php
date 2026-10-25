<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
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
        Schema::table('news_msts', function (Blueprint $table) {
            if (!$this->hasColumn('news_msts', 'division_id')) {
                $table->foreignId('division_id')->nullable()->after('sub_category_id')->constrained('divisions')->nullOnDelete();
            }
            if (!$this->hasColumn('news_msts', 'district_id')) {
                $table->foreignId('district_id')->nullable()->after('division_id')->constrained('districts')->nullOnDelete();
            }
            if (!$this->hasColumn('news_msts', 'upazila_id')) {
                $table->foreignId('upazila_id')->nullable()->after('district_id')->constrained('upazilas')->nullOnDelete();
            }

            try {
                $table->index(['district_id', 'status']);
            } catch (\Throwable $e) {}

            try {
                $table->index(['division_id', 'status']);
            } catch (\Throwable $e) {}
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_msts', function (Blueprint $table) {
            try { $table->dropForeign(['division_id']); } catch (\Throwable $e) {}
            try { $table->dropForeign(['district_id']); } catch (\Throwable $e) {}
            try { $table->dropForeign(['upazila_id']); } catch (\Throwable $e) {}

            try { $table->dropIndex(['district_id', 'status']); } catch (\Throwable $e) {}
            try { $table->dropIndex(['division_id', 'status']); } catch (\Throwable $e) {}

            $cols = ['division_id', 'district_id', 'upazila_id'];
            foreach ($cols as $col) {
                if ($this->hasColumn('news_msts', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
