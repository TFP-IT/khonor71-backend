<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rss_feeds', function (Blueprint $table) {
            $table->integer('cache_duration')->default(10)->after('posts')->comment('Cache TTL in minutes');
            $table->unsignedBigInteger('category_id')->nullable()->after('cache_duration')->comment('Map to local category');
            $table->string('fallback_image')->nullable()->after('category_id')->comment('Image to show if RSS item has no image');
            $table->integer('summary_length')->nullable()->after('fallback_image')->comment('Max characters for description');
            $table->text('include_keywords')->nullable()->after('summary_length')->comment('Only fetch items with these words');
            $table->text('exclude_keywords')->nullable()->after('include_keywords')->comment('Skip items with these words');
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
            $table->dropColumn([
                'cache_duration',
                'category_id',
                'fallback_image',
                'summary_length',
                'include_keywords',
                'exclude_keywords'
            ]);
        });
    }
};
