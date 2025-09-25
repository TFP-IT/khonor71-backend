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
        Schema::create('probashi_news_thumbnails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('probashi_news_id')->constrained('probashi_news')->onDelete('cascade');
            $table->string('thumbnail_path');
            $table->integer('frame_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('probashi_news_thumbnails');
    }
};
