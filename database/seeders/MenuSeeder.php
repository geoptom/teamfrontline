<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Page;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Menu::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $pages = Page::all();

        foreach ($pages as $page) {
            Menu::create([
                'name'=>$page->title,
                'slug'=>$page->slug,
                'url'=>"/".$page->slug,
                'location'=>'header',
                'position'=>1,
                'status'=>1,
            ]);
        }

        Menu::create([
            'name'=>'Products',
            'url'=>'/products',
            'location'=>'header',
            'position'=>2,
            'status'=>1,
        ]);
    }
}
