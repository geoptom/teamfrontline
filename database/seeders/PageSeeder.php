<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Page::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $pages = [
            [
                'title'=>'Terms And Conditions',
                'slug'=>'terms-and-conditions',
                'content'=>'<p>Team Frontline is a trusted IT and Power Solutions provider...</p>',
                'seo_title'=>'About Team Frontline',
                'seo_description'=>'Learn about Team Frontline, a leading IT and Power Solutions provider.',
                'is_visible'=>1,
                'show_in_menu'=>1,
            ],
            [
                'title'=>'Privacy Policy',
                'slug'=>'privacy-policy',
                'content'=>'<p>Get in touch with Team Frontline...</p>',
                'seo_title'=>'Contact Team Frontline',
                'seo_description'=>'Reach out to Team Frontline for IT & Power solutions.',
                'is_visible'=>1,
                'show_in_menu'=>1,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
