<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Converts publish_date from DATE to DATETIME to support
     * time-based article scheduling (e.g. "02 Sep 2026 at 09:30 PM").
     */
    public function up(): void
    {
        Schema::table('news_msts', function (Blueprint $table) {
            $table->dateTime('publish_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_msts', function (Blueprint $table) {
            $table->date('publish_date')->nullable()->change();
        });
    }
};
