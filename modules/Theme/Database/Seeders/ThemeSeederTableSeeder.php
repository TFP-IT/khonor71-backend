<?php

namespace Modules\Theme\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThemeSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('themes')->insert([
            ['name' => 'News', 'image_path' => 'backend/img/themes/2.png', 'is_active' => true],
        ]);
    }
}
