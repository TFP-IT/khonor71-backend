<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_msts', function (Blueprint $table) {
            $table->index('status', 'idx_news_status');
            $table->index('publish_date', 'idx_news_publish_date');
            $table->index('is_latest', 'idx_news_is_latest');
            $table->index('encode_title', 'idx_news_encode_title');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->index('slug', 'idx_categories_slug');
        });

        Schema::table('post_tags', function (Blueprint $table) {
            $table->index('news_id', 'idx_post_tags_news_id');
            $table->index('tag', 'idx_post_tags_tag');
        });

        Schema::table('post_seo_onpages', function (Blueprint $table) {
            $table->index('news_id', 'idx_post_seo_onpages_news_id');
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->index('event', 'idx_settings_event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_msts', function (Blueprint $table) {
            $table->dropIndex('idx_news_status');
            $table->dropIndex('idx_news_publish_date');
            $table->dropIndex('idx_news_is_latest');
            $table->dropIndex('idx_news_encode_title');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('idx_categories_slug');
        });

        Schema::table('post_tags', function (Blueprint $table) {
            $table->dropIndex('idx_post_tags_news_id');
            $table->dropIndex('idx_post_tags_tag');
        });

        Schema::table('post_seo_onpages', function (Blueprint $table) {
            $table->dropIndex('idx_post_seo_onpages_news_id');
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->dropIndex('idx_settings_event');
        });
    }
};
