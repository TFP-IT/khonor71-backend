<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_news_sources', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->text('feed_url');
            $table->char('feed_url_hash', 64)->unique();
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('category_id');
            $table->boolean('is_enabled')->default(false)->index();
            $table->timestamp('last_fetched_at')->nullable();
            $table->text('last_error')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
        });

        Schema::create('ai_news_candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_id')->nullable()->index();
            $table->char('source_hash', 64)->unique();
            $table->string('source_guid', 500)->nullable();
            $table->text('source_url');
            $table->string('source_title', 500);
            $table->text('source_excerpt')->nullable();
            $table->timestamp('source_published_at')->nullable();
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title', 255)->nullable();
            $table->string('short_head', 255)->nullable();
            $table->text('summary')->nullable();
            $table->longText('body')->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 320)->nullable();
            $table->json('keywords')->nullable();
            $table->string('model_name', 100)->nullable();
            $table->string('status', 20)->default('pending')->index();
            $table->text('error_message')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->unsignedBigInteger('news_mst_id')->nullable()->index();
            $table->timestamps();

            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_news_candidates');
        Schema::dropIfExists('ai_news_sources');
    }
};
