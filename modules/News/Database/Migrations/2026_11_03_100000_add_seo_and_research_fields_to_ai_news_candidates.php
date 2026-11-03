<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ai_news_candidates', function (Blueprint $table) {
            if (! Schema::hasColumn('ai_news_candidates', 'focus_keyword')) {
                $table->string('focus_keyword', 150)->nullable()->after('keywords');
            }
            if (! Schema::hasColumn('ai_news_candidates', 'schema_faq')) {
                $table->json('schema_faq')->nullable()->after('focus_keyword');
            }
            if (! Schema::hasColumn('ai_news_candidates', 'research_context')) {
                $table->longText('research_context')->nullable()->after('schema_faq');
            }
            if (! Schema::hasColumn('ai_news_candidates', 'origin')) {
                $table->string('origin', 20)->default('rss')->after('research_context');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ai_news_candidates', function (Blueprint $table) {
            foreach (['origin', 'research_context', 'schema_faq', 'focus_keyword'] as $column) {
                if (Schema::hasColumn('ai_news_candidates', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
