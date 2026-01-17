<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Testimonial::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $testimonials = [
            ['name'=>'John Doe','designation'=>'CTO','company'=>'ABC Corp','message'=>'Excellent IT solutions.','status'=>1],
            ['name'=>'Jane Smith','designation'=>'Manager','company'=>'XYZ Ltd','message'=>'Reliable power backup products.','status'=>1],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
