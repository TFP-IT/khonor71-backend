<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Helper to safely check if a table exists in MySQL
     */
    private function hasTable(string $table): bool
    {
        try {
            $result = DB::select("SHOW TABLES LIKE '{$table}'");
            return !empty($result);
        } catch (\Throwable $e) {
            return Schema::hasTable($table);
        }
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!$this->hasTable('auto_post_settings')) {
            try {
                Schema::create('auto_post_settings', function (Blueprint $table) {
                    $table->id();

                    // Platform: facebook, twitter, etc.
                    $table->string('platform'); // 'facebook' or 'twitter'

                    // Facebook
                    $table->string('page_id')->nullable();

                    // Twitter (X)
                    $table->string('api_key')->nullable();
                    $table->string('api_secret')->nullable();
                    $table->string('access_token_secret')->nullable();

                    // Common
                    $table->text('access_token')->nullable();
                    $table->boolean('is_test_mode')->default(false); // it define which version use is sendbox, paid, free etc.
                    $table->boolean('is_active')->default(false);

                    $table->timestamps();
                });
            } catch (\Throwable $e) {
                if (!str_contains($e->getMessage(), 'already exists') && !str_contains($e->getMessage(), '1050')) {
                    throw $e;
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_post_settings');
    }
};
