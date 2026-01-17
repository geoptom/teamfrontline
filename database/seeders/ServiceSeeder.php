<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Power Solutions',
                'short_description' => 'Reliable UPS, power backup, and energy solutions.',
                'description' => 'End-to-end power backup, UPS, and energy management solutions for businesses.',
                'image' => 'services/power.jpg',
                'icon' => 'solar',
                'status' => true,
            ],
            [
                'title' => 'Networking',
                'short_description' => 'LAN/WAN, wireless, and structured cabling solutions.',
                'description' => 'Comprehensive networking and connectivity solutions tailored to your organization.',
                'image' => 'services/network.jpg',
                'icon' => 'network',
                'status' => true,
            ],
            [
                'title' => 'Surveillance',
                'short_description' => 'CCTV, access control, and smart surveillance solutions.',
                'description' => 'Modern surveillance systems for commercial, industrial, and government clients.',
                'image' => 'services/surveillance.jpg',
                'icon' => 'camera',
                'status' => true,
            ],
            [
                'title' => 'Cloud Services',
                'short_description' => 'Cloud migration, hosting, and management solutions.',
                'description' => 'Scalable cloud solutions to enhance business agility and performance.',
                'image' => 'services/cloud.jpg',
                'icon' => 'cloud',
                'status' => true,
            ],
            [
                'title' => 'IT Consulting',
                'short_description' => 'Strategic IT planning and consulting services.',
                'description' => 'Expert IT consulting to align technology with business goals and drive growth.',
                'image' => 'services/it_consulting.jpg',
                'icon' => 'consulting',
                'status' => true,
            ],
        ];

        foreach ($services as $item) {
            Service::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
