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
        Schema::table('video_news', function (Blueprint $table) {
            $table->string('thumbnail_video')->nullable()->after('video_url');
            $table->boolean('is_tv_news')->default(false)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_news', function (Blueprint $table) {
            $table->dropColumn('thumbnail_video');
            $table->dropColumn('is_tv_news');
        });
    }
};
