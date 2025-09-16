<?php

use App\Enums\ActivationStatusEnum;
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
        Schema::create('probashi_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->unsignedBigInteger('web_user_id');
            $table->foreign('web_user_id')->references('id')->on('web_users')->onDelete('cascade');

            $table->date('publish_date');
            $table->unsignedInteger('total_view')->default(0);
            $table->string('encode_title', 200);
            $table->string('title');
            $table->longText('details');
            $table->string('thumbnail_image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_title')->nullable();
            $table->string('video')->nullable();
            $table->string('video_url')->nullable();
            $table->string('reference')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->enum('status', ActivationStatusEnum::toArray())->default(ActivationStatusEnum::ACTIVE->value);

            $table->updateCreatedBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('probashi_news');
    }
};