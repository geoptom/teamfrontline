<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactMessage;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ContactMessage::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        ContactMessage::create([
            'name'=>'Visitor Name',
            'email'=>'visitor@example.com',
            'phone'=>'+91 98765 43210',
            'subject'=>'Inquiry',
            'message'=>'I would like to know more about your products.',
        ]);
    }
}
