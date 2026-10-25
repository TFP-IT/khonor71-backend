<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
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
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rss_feeds', function (Blueprint $table) {
            if (!$this->hasColumn('rss_feeds', 'cache_duration')) {
                $table->integer('cache_duration')->default(10)->after('posts')->comment('Cache TTL in minutes');
            }
            if (!$this->hasColumn('rss_feeds', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable()->after('cache_duration')->comment('Map to local category');
            }
            if (!$this->hasColumn('rss_feeds', 'fallback_image')) {
                $table->string('fallback_image')->nullable()->after('category_id')->comment('Image to show if RSS item has no image');
            }
            if (!$this->hasColumn('rss_feeds', 'summary_length')) {
                $table->integer('summary_length')->nullable()->after('fallback_image')->comment('Max characters for description');
            }
            if (!$this->hasColumn('rss_feeds', 'include_keywords')) {
                $table->text('include_keywords')->nullable()->after('summary_length')->comment('Only fetch items with these words');
            }
            if (!$this->hasColumn('rss_feeds', 'exclude_keywords')) {
                $table->text('exclude_keywords')->nullable()->after('include_keywords')->comment('Skip items with these words');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rss_feeds', function (Blueprint $table) {
            $cols = ['cache_duration', 'category_id', 'fallback_image', 'summary_length', 'include_keywords', 'exclude_keywords'];
            foreach ($cols as $col) {
                if ($this->hasColumn('rss_feeds', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
