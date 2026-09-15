<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('news_msts', function (Blueprint $table) {
            $table->foreignId('division_id')->nullable()->after('sub_category_id')->constrained('divisions')->nullOnDelete();
            $table->foreignId('district_id')->nullable()->after('division_id')->constrained('districts')->nullOnDelete();
            $table->foreignId('upazila_id')->nullable()->after('district_id')->constrained('upazilas')->nullOnDelete();

            $table->index(['district_id', 'status']);
            $table->index(['division_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_msts', function (Blueprint $table) {
            $table->dropForeign(['division_id']);
            $table->dropForeign(['district_id']);
            $table->dropForeign(['upazila_id']);

            $table->dropIndex(['district_id', 'status']);
            $table->dropIndex(['division_id', 'status']);

            $table->dropColumn(['division_id', 'district_id', 'upazila_id']);
        });
    }
};
