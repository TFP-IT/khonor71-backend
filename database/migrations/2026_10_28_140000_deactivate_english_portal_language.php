<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('languages')) {
            return;
        }

        $banglaLanguageId = DB::table('languages')->where('value', 'bn')->value('id');

        if (Schema::hasColumn('languages', 'status')) {
            DB::table('languages')->where('value', 'en')->update(['status' => 0]);
            DB::table('languages')->where('value', 'bn')->update(['status' => 1]);
        }

        if ($banglaLanguageId && Schema::hasTable('app_settings') && Schema::hasColumn('app_settings', 'language_id')) {
            DB::table('app_settings')->update(['language_id' => $banglaLanguageId]);
        }

        if ($banglaLanguageId && Schema::hasTable('applications') && Schema::hasColumn('applications', 'language_id')) {
            DB::table('applications')->update(['language_id' => $banglaLanguageId]);
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('languages') || !Schema::hasColumn('languages', 'status')) {
            return;
        }

        DB::table('languages')->where('value', 'en')->update(['status' => 1]);
    }
};
