<?php

namespace Modules\Localize\Database\Seeders;

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        $bangla = \DB::table('languages')->where('value', 'bn')->first();

        if ($bangla) {
            \DB::table('languages')->where('id', $bangla->id)->update([
                'langname' => 'Bengali/Bangla',
                'status' => 1,
                'updated_at' => $now,
            ]);
            return;
        }

        // Add Bangla without deleting or rewriting existing language rows.
        \DB::table('languages')->insert([
            'langname' => 'Bengali/Bangla',
            'value' => 'bn',
            'status' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
