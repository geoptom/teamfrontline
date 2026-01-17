<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        BlogCategory::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = [
            ['name'=>'Networking','slug'=>'networking','status'=>1],
            ['name'=>'Power Solutions','slug'=>'power-solutions','status'=>1],
        ];

        foreach ($categories as $c) {
            BlogCategory::create($c);
        }
    }
}
