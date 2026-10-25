<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
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
     *
     * @return void
     */
    public function up()
    {
        if (!$this->hasColumn('languages', 'status')) {
            try {
                Schema::table('languages', function (Blueprint $table) {
                    $table->boolean('status')->default(true)->after('value');
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
     *
     * @return void
     */
    public function down()
    {
        if ($this->hasColumn('languages', 'status')) {
            try {
                Schema::table('languages', function (Blueprint $table) {
                    $table->dropColumn('status');
                });
            } catch (\Throwable $e) {}
        }
    }
};
