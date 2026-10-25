<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Check if an index exists on a table in MySQL.
     */
    private function hasIndex(string $table, string $indexName): bool
    {
        try {
            $result = DB::select("SHOW INDEXES FROM `{$table}` WHERE Key_name = '{$indexName}'");
            return !empty($result);
        } catch (\Throwable $e) {
            return false;
        }
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_msts', function (Blueprint $table) {
            if (!$this->hasIndex('news_msts', 'idx_news_status')) {
                $table->index('status', 'idx_news_status');
            }
            if (!$this->hasIndex('news_msts', 'idx_news_publish_date')) {
                $table->index('publish_date', 'idx_news_publish_date');
            }
            if (!$this->hasIndex('news_msts', 'idx_news_is_latest')) {
                $table->index('is_latest', 'idx_news_is_latest');
            }
            if (!$this->hasIndex('news_msts', 'idx_news_encode_title')) {
                $table->index('encode_title', 'idx_news_encode_title');
            }
        });

        if (!$this->hasIndex('categories', 'idx_categories_slug')) {
            try {
                DB::statement('CREATE INDEX `idx_categories_slug` ON `categories` (`slug`(191))');
            } catch (\Throwable $e) {}
        }

        Schema::table('post_tags', function (Blueprint $table) {
            if (!$this->hasIndex('post_tags', 'idx_post_tags_news_id')) {
                $table->index('news_id', 'idx_post_tags_news_id');
            }
            if (!$this->hasIndex('post_tags', 'idx_post_tags_tag')) {
                $table->index('tag', 'idx_post_tags_tag');
            }
        });

        Schema::table('post_seo_onpages', function (Blueprint $table) {
            if (!$this->hasIndex('post_seo_onpages', 'idx_post_seo_onpages_news_id')) {
                $table->index('news_id', 'idx_post_seo_onpages_news_id');
            }
        });

        if (!$this->hasIndex('settings', 'idx_settings_event')) {
            try {
                DB::statement('CREATE INDEX `idx_settings_event` ON `settings` (`event`(191))');
            } catch (\Throwable $e) {}
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_msts', function (Blueprint $table) {
            if ($this->hasIndex('news_msts', 'idx_news_status')) {
                $table->dropIndex('idx_news_status');
            }
            if ($this->hasIndex('news_msts', 'idx_news_publish_date')) {
                $table->dropIndex('idx_news_publish_date');
            }
            if ($this->hasIndex('news_msts', 'idx_news_is_latest')) {
                $table->dropIndex('idx_news_is_latest');
            }
            if ($this->hasIndex('news_msts', 'idx_news_encode_title')) {
                $table->dropIndex('idx_news_encode_title');
            }
        });

        if ($this->hasIndex('categories', 'idx_categories_slug')) {
            try {
                DB::statement('DROP INDEX `idx_categories_slug` ON `categories`');
            } catch (\Throwable $e) {}
        }

        Schema::table('post_tags', function (Blueprint $table) {
            if ($this->hasIndex('post_tags', 'idx_post_tags_news_id')) {
                $table->dropIndex('idx_post_tags_news_id');
            }
            if ($this->hasIndex('post_tags', 'idx_post_tags_tag')) {
                $table->dropIndex('idx_post_tags_tag');
            }
        });

        Schema::table('post_seo_onpages', function (Blueprint $table) {
            if ($this->hasIndex('post_seo_onpages', 'idx_post_seo_onpages_news_id')) {
                $table->dropIndex('idx_post_seo_onpages_news_id');
            }
        });

        if ($this->hasIndex('settings', 'idx_settings_event')) {
            try {
                DB::statement('DROP INDEX `idx_settings_event` ON `settings`');
            } catch (\Throwable $e) {}
        }
    }
};
