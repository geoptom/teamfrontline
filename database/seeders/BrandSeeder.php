<?php
namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Brand::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $brands = [
            ['logo' => 'vertiv.png', 'name' => 'Vertiv', 'slug' => 'vertiv', 'website' => 'https://www.vertiv.com', 'status' => 1, 'is_featured' => 1],
            ['logo' => 'cisco.png', 'name' => 'Cisco', 'slug' => 'cisco', 'website' => 'https://www.cisco.com', 'status' => 1, 'is_featured' => 1],
            ['logo' => 'apc.png', 'name' => 'APC', 'slug' => 'apc', 'website' => 'https://www.apc.com', 'status' => 1, 'is_featured' => 1],
            ['logo' => 'hikvision.png', 'name' => 'Hikvision', 'slug' => 'hikvision', 'website' => 'https://www.hikvision.com', 'status' => 1, 'is_featured' => 1],
            ['logo' => 'hp.png', 'name' => 'HP', 'slug' => 'hp', 'website' => 'https://www.hp.com', 'status' => 1, 'is_featured' => 1],

            ['logo' => '', 'name' => 'Quick Heal', 'slug' => Str::slug('Quick Heal') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Red Hat', 'slug' => Str::slug('Red Hat') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Ricoh', 'slug' => Str::slug('Ricoh') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Segate', 'slug' => Str::slug('Segate') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Trend Micro', 'slug' => Str::slug('Trend Micro') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Alhua', 'slug' => Str::slug('Alhua') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'CP plus', 'slug' => Str::slug('CP plus') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Tacitine', 'slug' => Str::slug('Tacitine') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Sophos', 'slug' => Str::slug('Sophos') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Fortinet', 'slug' => Str::slug('Fortinet') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Rocket', 'slug' => Str::slug('Rocket') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Exide', 'slug' => Str::slug('Exide') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Quanta', 'slug' => Str::slug('Quanta') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Dell', 'slug' => Str::slug('Dell') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Toshiba', 'slug' => Str::slug('Toshiba') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Hewlett', 'slug' => Str::slug('Hewlett') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'IBM', 'slug' => Str::slug('IBM') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Hitachi', 'slug' => Str::slug('Hitachi') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Dellemc', 'slug' => Str::slug('Dellemc') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Lenovo', 'slug' => Str::slug('Lenovo') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Qnap', 'slug' => Str::slug('Qnap') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Asus', 'slug' => Str::slug('Asus') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Asustor', 'slug' => Str::slug('Asustor') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Gigabyte', 'slug' => Str::slug('Gigabyte') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Canon', 'slug' => Str::slug('Canon') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Brother', 'slug' => Str::slug('Brother') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Acer', 'slug' => Str::slug('Acer') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Belkin', 'slug' => Str::slug('Belkin') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Cyberroam', 'slug' => Str::slug('Cyberroam') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'D-Link', 'slug' => Str::slug('D-Link') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Double Take', 'slug' => Str::slug('Double Take') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'DELL EMC', 'slug' => Str::slug('DELL EMC') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Epson', 'slug' => Str::slug('Epson') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Fujitsu', 'slug' => Str::slug('Fujitsu') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Huawei', 'slug' => Str::slug('Huawei') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Kaspersky', 'slug' => Str::slug('Kaspersky') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Kodak', 'slug' => Str::slug('Kodak') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Microsoft', 'slug' => Str::slug('Microsoft') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Molex', 'slug' => Str::slug('Molex') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Netcore', 'slug' => Str::slug('Netcore') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Netrack', 'slug' => Str::slug('Netrack') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'NxtGen', 'slug' => Str::slug('NxtGen') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],
            ['logo' => '', 'name' => 'Oracle', 'slug' => Str::slug('Oracle') . '-' . Str::random(5), 'website' => '', 'status' => 1, 'is_featured' => 1],

        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
