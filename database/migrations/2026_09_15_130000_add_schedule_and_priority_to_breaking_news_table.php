<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('breaking_news', function (Blueprint $table) {
            if (!Schema::hasColumn('breaking_news', 'url')) {
                $table->string('url', 500)->nullable()->after('news_id');
            }
            if (!Schema::hasColumn('breaking_news', 'start_time')) {
                $table->dateTime('start_time')->nullable()->after('time_stamp');
            }
            if (!Schema::hasColumn('breaking_news', 'end_time')) {
                $table->dateTime('end_time')->nullable()->after('start_time');
            }
            if (!Schema::hasColumn('breaking_news', 'priority')) {
                $table->integer('priority')->default(0)->after('end_time');
            }

            $table->index(['status', 'language_id', 'priority'], 'bn_status_lang_priority_idx');
        });

        // Backfill url from existing JSON title column if present
        try {
            DB::statement("UPDATE breaking_news SET url = JSON_UNQUOTE(JSON_EXTRACT(title, '$.url')) WHERE title LIKE '{%' AND (url IS NULL OR url = '')");
        } catch (\Throwable $e) {
            // Log or ignore if JSON functions are not supported
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('breaking_news', function (Blueprint $table) {
            $table->dropIndex('bn_status_lang_priority_idx');
            $table->dropColumn(['url', 'start_time', 'end_time', 'priority']);
        });
    }
};
