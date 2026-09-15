<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            ['id' => 1, 'name' => 'Dhaka', 'bn_name' => 'ঢাকা', 'url' => 'dhaka'],
            ['id' => 2, 'name' => 'Chattogram', 'bn_name' => 'চট্টগ্রাম', 'url' => 'chattogram'],
            ['id' => 3, 'name' => 'Rajshahi', 'bn_name' => 'রাজশাহী', 'url' => 'rajshahi'],
            ['id' => 4, 'name' => 'Khulna', 'bn_name' => 'খুলনা', 'url' => 'khulna'],
            ['id' => 5, 'name' => 'Barishal', 'bn_name' => 'বরিশাল', 'url' => 'barishal'],
            ['id' => 6, 'name' => 'Sylhet', 'bn_name' => 'সিলেট', 'url' => 'sylhet'],
            ['id' => 7, 'name' => 'Rangpur', 'bn_name' => 'রংপুর', 'url' => 'rangpur'],
            ['id' => 8, 'name' => 'Mymensingh', 'bn_name' => 'ময়মনসিংহ', 'url' => 'mymensingh'],
        ];

        foreach ($divisions as $division) {
            Division::updateOrCreate(
                ['id' => $division['id']],
                [
                    'name'    => $division['name'],
                    'bn_name' => $division['bn_name'],
                    'url'     => $division['url'],
                ]
            );
        }
    }
}
