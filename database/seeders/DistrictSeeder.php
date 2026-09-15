<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            // Dhaka Division (id: 1)
            ['id' => 1, 'division_id' => 1, 'name' => 'Dhaka', 'bn_name' => 'ঢাকা', 'lat' => '23.8103', 'lon' => '90.4125', 'url' => 'dhaka'],
            ['id' => 2, 'division_id' => 1, 'name' => 'Gazipur', 'bn_name' => 'গাজীপুর', 'lat' => '24.0023', 'lon' => '90.4264', 'url' => 'gazipur'],
            ['id' => 3, 'division_id' => 1, 'name' => 'Narayanganj', 'bn_name' => 'নারায়ণগঞ্জ', 'lat' => '23.6337', 'lon' => '90.4965', 'url' => 'narayanganj'],
            ['id' => 4, 'division_id' => 1, 'name' => 'Tangail', 'bn_name' => 'টাঙ্গাইল', 'lat' => '24.2513', 'lon' => '89.9167', 'url' => 'tangail'],
            ['id' => 5, 'division_id' => 1, 'name' => 'Faridpur', 'bn_name' => 'ফরিদপুর', 'lat' => '23.6071', 'lon' => '89.8429', 'url' => 'faridpur'],
            ['id' => 6, 'division_id' => 1, 'name' => 'Manikganj', 'bn_name' => 'মানিকগঞ্জ', 'lat' => '23.8644', 'lon' => '90.0047', 'url' => 'manikganj'],
            ['id' => 7, 'division_id' => 1, 'name' => 'Munshiganj', 'bn_name' => 'মুন্সীগঞ্জ', 'lat' => '23.5422', 'lon' => '90.5305', 'url' => 'munshiganj'],
            ['id' => 8, 'division_id' => 1, 'name' => 'Narsingdi', 'bn_name' => 'নরসিংদী', 'lat' => '23.9322', 'lon' => '90.7154', 'url' => 'narsingdi'],
            ['id' => 9, 'division_id' => 1, 'name' => 'Gopalganj', 'bn_name' => 'গোপালগঞ্জ', 'lat' => '23.0051', 'lon' => '89.8266', 'url' => 'gopalganj'],
            ['id' => 10, 'division_id' => 1, 'name' => 'Kishoreganj', 'bn_name' => 'কিশোরগঞ্জ', 'lat' => '24.4449', 'lon' => '90.7766', 'url' => 'kishoreganj'],
            ['id' => 11, 'division_id' => 1, 'name' => 'Madaripur', 'bn_name' => 'মাদারীপুর', 'lat' => '23.1641', 'lon' => '90.1897', 'url' => 'madaripur'],
            ['id' => 12, 'division_id' => 1, 'name' => 'Rajbari', 'bn_name' => 'রাজবাড়ী', 'lat' => '23.7574', 'lon' => '89.6445', 'url' => 'rajbari'],
            ['id' => 13, 'division_id' => 1, 'name' => 'Shariatpur', 'bn_name' => 'শরীয়তপুর', 'lat' => '23.2423', 'lon' => '90.4348', 'url' => 'shariatpur'],

            // Chattogram Division (id: 2)
            ['id' => 14, 'division_id' => 2, 'name' => 'Chattogram', 'bn_name' => 'চট্টগ্রাম', 'lat' => '22.3569', 'lon' => '91.7832', 'url' => 'chattogram'],
            ['id' => 15, 'division_id' => 2, 'name' => "Cox's Bazar", 'bn_name' => 'কক্সবাজার', 'lat' => '21.4272', 'lon' => '92.0058', 'url' => 'coxs-bazar'],
            ['id' => 16, 'division_id' => 2, 'name' => 'Cumilla', 'bn_name' => 'কুমিল্লা', 'lat' => '23.4682', 'lon' => '91.1788', 'url' => 'cumilla'],
            ['id' => 17, 'division_id' => 2, 'name' => 'Feni', 'bn_name' => 'ফেনী', 'lat' => '23.0186', 'lon' => '91.3966', 'url' => 'feni'],
            ['id' => 18, 'division_id' => 2, 'name' => 'Brahmanbaria', 'bn_name' => 'ব্রাহ্মণবাড়িয়া', 'lat' => '23.9571', 'lon' => '91.1119', 'url' => 'brahmanbaria'],
            ['id' => 19, 'division_id' => 2, 'name' => 'Rangamati', 'bn_name' => 'রাঙ্গামাটি', 'lat' => '22.7324', 'lon' => '92.2985', 'url' => 'rangamati'],
            ['id' => 20, 'division_id' => 2, 'name' => 'Noakhali', 'bn_name' => 'নোয়াখালী', 'lat' => '22.8696', 'lon' => '91.0994', 'url' => 'noakhali'],
            ['id' => 21, 'division_id' => 2, 'name' => 'Chandpur', 'bn_name' => 'চাঁদপুর', 'lat' => '23.2333', 'lon' => '90.6667', 'url' => 'chandpur'],
            ['id' => 22, 'division_id' => 2, 'name' => 'Lakshmipur', 'bn_name' => 'লক্ষ্মীপুর', 'lat' => '22.9425', 'lon' => '90.8412', 'url' => 'lakshmipur'],
            ['id' => 23, 'division_id' => 2, 'name' => 'Khagrachhari', 'bn_name' => 'খাগড়াছড়ি', 'lat' => '23.1193', 'lon' => '91.9847', 'url' => 'khagrachhari'],
            ['id' => 24, 'division_id' => 2, 'name' => 'Bandarban', 'bn_name' => 'বান্দরবান', 'lat' => '22.1953', 'lon' => '92.2184', 'url' => 'bandarban'],

            // Rajshahi Division (id: 3)
            ['id' => 25, 'division_id' => 3, 'name' => 'Rajshahi', 'bn_name' => 'রাজশাহী', 'lat' => '24.3745', 'lon' => '88.6042', 'url' => 'rajshahi'],
            ['id' => 26, 'division_id' => 3, 'name' => 'Bogura', 'bn_name' => 'বগুড়া', 'lat' => '24.8465', 'lon' => '89.3770', 'url' => 'bogura'],
            ['id' => 27, 'division_id' => 3, 'name' => 'Pabna', 'bn_name' => 'পাবনা', 'lat' => '24.0064', 'lon' => '89.2372', 'url' => 'pabna'],
            ['id' => 28, 'division_id' => 3, 'name' => 'Sirajganj', 'bn_name' => 'সিরাজগঞ্জ', 'lat' => '24.4534', 'lon' => '89.7008', 'url' => 'sirajganj'],
            ['id' => 29, 'division_id' => 3, 'name' => 'Naogaon', 'bn_name' => 'নওগাঁ', 'lat' => '24.7936', 'lon' => '88.9318', 'url' => 'naogaon'],
            ['id' => 30, 'division_id' => 3, 'name' => 'Natore', 'bn_name' => 'নাটোর', 'lat' => '24.4206', 'lon' => '89.0003', 'url' => 'natore'],
            ['id' => 31, 'division_id' => 3, 'name' => 'Chapainawabganj', 'bn_name' => 'চাঁপাইনবাবগঞ্জ', 'lat' => '24.5965', 'lon' => '88.2775', 'url' => 'chapainawabganj'],
            ['id' => 32, 'division_id' => 3, 'name' => 'Joypurhat', 'bn_name' => 'জয়পুরহাট', 'lat' => '25.1015', 'lon' => '89.0277', 'url' => 'joypurhat'],

            // Khulna Division (id: 4)
            ['id' => 33, 'division_id' => 4, 'name' => 'Khulna', 'bn_name' => 'খুলনা', 'lat' => '22.8456', 'lon' => '89.5403', 'url' => 'khulna'],
            ['id' => 34, 'division_id' => 4, 'name' => 'Jashore', 'bn_name' => 'যশোর', 'lat' => '23.1634', 'lon' => '89.2182', 'url' => 'jashore'],
            ['id' => 35, 'division_id' => 4, 'name' => 'Kushtia', 'bn_name' => 'কুষ্টিয়া', 'lat' => '23.9013', 'lon' => '89.1204', 'url' => 'kushtia'],
            ['id' => 36, 'division_id' => 4, 'name' => 'Satkhira', 'bn_name' => 'সাতক্ষীরা', 'lat' => '22.7185', 'lon' => '89.0705', 'url' => 'satkhira'],
            ['id' => 37, 'division_id' => 4, 'name' => 'Bagerhat', 'bn_name' => 'বাগেরহাট', 'lat' => '22.6516', 'lon' => '89.7859', 'url' => 'bagerhat'],
            ['id' => 38, 'division_id' => 4, 'name' => 'Jhenaidah', 'bn_name' => 'ঝিনাইদহ', 'lat' => '23.5448', 'lon' => '89.1539', 'url' => 'jhenaidah'],
            ['id' => 39, 'division_id' => 4, 'name' => 'Chuadanga', 'bn_name' => 'চুয়াডাঙ্গা', 'lat' => '23.6402', 'lon' => '88.8418', 'url' => 'chuadanga'],
            ['id' => 40, 'division_id' => 4, 'name' => 'Magura', 'bn_name' => 'মাগুরা', 'lat' => '23.4873', 'lon' => '89.4198', 'url' => 'magura'],
            ['id' => 41, 'division_id' => 4, 'name' => 'Meherpur', 'bn_name' => 'মেহেরপুর', 'lat' => '23.7622', 'lon' => '88.6318', 'url' => 'meherpur'],
            ['id' => 42, 'division_id' => 4, 'name' => 'Narail', 'bn_name' => 'নড়াইল', 'lat' => '23.1725', 'lon' => '89.5127', 'url' => 'narail'],

            // Barishal Division (id: 5)
            ['id' => 43, 'division_id' => 5, 'name' => 'Barishal', 'bn_name' => 'বরিশাল', 'lat' => '22.7010', 'lon' => '90.3535', 'url' => 'barishal'],
            ['id' => 44, 'division_id' => 5, 'name' => 'Patuakhali', 'bn_name' => 'পটুয়াখালী', 'lat' => '22.3596', 'lon' => '90.3299', 'url' => 'patuakhali'],
            ['id' => 45, 'division_id' => 5, 'name' => 'Bhola', 'bn_name' => 'ভোলা', 'lat' => '22.6859', 'lon' => '90.6482', 'url' => 'bhola'],
            ['id' => 46, 'division_id' => 5, 'name' => 'Pirojpur', 'bn_name' => 'পিরোজপুর', 'lat' => '22.5841', 'lon' => '89.9720', 'url' => 'pirojpur'],
            ['id' => 47, 'division_id' => 5, 'name' => 'Barguna', 'bn_name' => 'বরগুনা', 'lat' => '22.0953', 'lon' => '90.1121', 'url' => 'barguna'],
            ['id' => 48, 'division_id' => 5, 'name' => 'Jhalokati', 'bn_name' => 'ঝালকাঠি', 'lat' => '22.6406', 'lon' => '90.1987', 'url' => 'jhalokati'],

            // Sylhet Division (id: 6)
            ['id' => 49, 'division_id' => 6, 'name' => 'Sylhet', 'bn_name' => 'সিলেট', 'lat' => '24.8949', 'lon' => '91.8687', 'url' => 'sylhet'],
            ['id' => 50, 'division_id' => 6, 'name' => 'Moulvibazar', 'bn_name' => 'মৌলভীবাজার', 'lat' => '24.4829', 'lon' => '91.7774', 'url' => 'moulvibazar'],
            ['id' => 51, 'division_id' => 6, 'name' => 'Habiganj', 'bn_name' => 'হবিগঞ্জ', 'lat' => '24.3749', 'lon' => '91.4168', 'url' => 'habiganj'],
            ['id' => 52, 'division_id' => 6, 'name' => 'Sunamganj', 'bn_name' => 'সুনামগঞ্জ', 'lat' => '25.0658', 'lon' => '91.3950', 'url' => 'sunamganj'],

            // Rangpur Division (id: 7)
            ['id' => 53, 'division_id' => 7, 'name' => 'Rangpur', 'bn_name' => 'রংপুর', 'lat' => '25.7439', 'lon' => '89.2752', 'url' => 'rangpur'],
            ['id' => 54, 'division_id' => 7, 'name' => 'Dinajpur', 'bn_name' => 'দিনাজপুর', 'lat' => '25.6217', 'lon' => '88.6354', 'url' => 'dinajpur'],
            ['id' => 55, 'division_id' => 7, 'name' => 'Gaibandha', 'bn_name' => 'গাইবান্ধা', 'lat' => '25.3288', 'lon' => '89.5281', 'url' => 'gaibandha'],
            ['id' => 56, 'division_id' => 7, 'name' => 'Kurigram', 'bn_name' => 'কুড়িগ্রাম', 'lat' => '25.8054', 'lon' => '89.6362', 'url' => 'kurigram'],
            ['id' => 57, 'division_id' => 7, 'name' => 'Nilphamari', 'bn_name' => 'নীলফামারী', 'lat' => '25.9318', 'lon' => '88.8560', 'url' => 'nilphamari'],
            ['id' => 58, 'division_id' => 7, 'name' => 'Lalmonirhat', 'bn_name' => 'লালমনিরহাট', 'lat' => '25.9923', 'lon' => '89.2847', 'url' => 'lalmonirhat'],
            ['id' => 59, 'division_id' => 7, 'name' => 'Panchagarh', 'bn_name' => 'পঞ্চগড়', 'lat' => '26.3411', 'lon' => '88.5542', 'url' => 'panchagarh'],
            ['id' => 60, 'division_id' => 7, 'name' => 'Thakurgaon', 'bn_name' => 'ঠাকুরগাঁও', 'lat' => '26.0337', 'lon' => '88.4617', 'url' => 'thakurgaon'],

            // Mymensingh Division (id: 8)
            ['id' => 61, 'division_id' => 8, 'name' => 'Mymensingh', 'bn_name' => 'ময়মনসিংহ', 'lat' => '24.7471', 'lon' => '90.4203', 'url' => 'mymensingh'],
            ['id' => 62, 'division_id' => 8, 'name' => 'Jamalpur', 'bn_name' => 'জামালপুর', 'lat' => '24.9375', 'lon' => '89.9378', 'url' => 'jamalpur'],
            ['id' => 63, 'division_id' => 8, 'name' => 'Netrokona', 'bn_name' => 'নেত্রকোণা', 'lat' => '24.8709', 'lon' => '90.7279', 'url' => 'netrokona'],
            ['id' => 64, 'division_id' => 8, 'name' => 'Sherpur', 'bn_name' => 'শেরপুর', 'lat' => '25.0205', 'lon' => '90.0153', 'url' => 'sherpur'],
        ];

        foreach ($districts as $district) {
            District::updateOrCreate(
                ['id' => $district['id']],
                [
                    'division_id' => $district['division_id'],
                    'name'        => $district['name'],
                    'bn_name'     => $district['bn_name'],
                    'lat'         => $district['lat'],
                    'lon'         => $district['lon'],
                    'url'         => $district['url'],
                ]
            );
        }
    }
}
