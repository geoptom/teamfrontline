<?php
namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Blog::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $user     = User::first();
        $category = BlogCategory::first();

        $blogs = [
            [
                'user_id'         => $user->id,
                'category_id'     => $category->id,
                'title'           => 'Top Networking Trends 2025',
                'slug'            => 'top-networking-trends-2025',
                'excerpt'         => 'Latest networking technologies for enterprises...',
                'content'         => '<p>Networking trends content here...</p>',
                'status'          => 1,
                'seo_title'       => 'Networking Trends',
                'seo_description' => 'Learn about top networking trends in 2025.',
            ],

            [
                'user_id'         => $user->id,
                'category_id'     => $category->id,
                'title'           => 'How to Secure Your Network in 2025',
                'slug'            => 'secure-your-network-2025',
                'excerpt'         => 'Best practices and tools to protect enterprise networks in 2025.',
                'content'         => '<p>Security approaches for modern networks, including zero trust, segmentation, and improved monitoring.</p>',
                'status'          => 1,
                'seo_title'       => 'Network Security 2025',
                'seo_description' => 'Discover how to secure your network with the latest strategies and technologies in 2025.',
            ],
            [
                'user_id'         => $user->id,
                'category_id'     => $category->id,
                'title'           => 'Edge Computing and Networking',
                'slug'            => 'edge-computing-networking',
                'excerpt'         => 'How edge computing is reshaping network architectures and performance.',
                'content'         => '<p>Explore the convergence of edge compute and networking to reduce latency and improve user experience.</p>',
                'status'          => 1,
                'seo_title'       => 'Edge Computing & Networking',
                'seo_description' => 'Understand the role of edge computing in modern network design and deployment.',
            ],
            [
                'user_id'         => $user->id,
                'category_id'     => $category->id,
                'title'           => 'AI-Driven Network Automation',
                'slug'            => 'ai-driven-network-automation',
                'excerpt'         => 'Automating network operations with AI and machine learning.',
                'content'         => '<p>AI techniques for automated provisioning, anomaly detection, and predictive maintenance in networks.</p>',
                'status'          => 1,
                'seo_title'       => 'AI Network Automation',
                'seo_description' => 'Learn how AI is transforming network automation and operational efficiency.',
            ],
        ];

        foreach ($blogs as $b) {
            Blog::create($b);
        }
    }
}
