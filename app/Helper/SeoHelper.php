<?php

namespace App\Helper;

use Artesaos\SEOTools\Facades\JsonLdMulti;
use JsonLd;
use OpenGraph;
use SEOMeta;
use Twitter;
use Illuminate\Support\Facades\URL;

class SeoHelper
{
    protected $pages = [

        // ---------------- DEFAULT SITE SEO ----------------
        'default' => [
            'title'       => 'TeamFrontline | IT Solutions, Power, Networking, Data Center in Kerala',
            'description' => 'TeamFrontline is a leading IT Solution provider in Kerala providing UPS, Power Solutions, Networking, Data Center, Servers, Surveillance, Cloud & IT Services.',
            'keywords'    => [
                'teamfrontline', 'it solutions kerala', 'ups dealers kerala', 'networking solutions',
                'data center setup', 'server suppliers', 'surveillance systems', 'power solutions'
            ],
        ],

        // ---------------- STATIC PAGES ----------------
        'home' => [
            'title'       => 'TeamFrontline | Complete Technology & Power Solutions',
            'description' => 'Explore solutions for Power, IT Infrastructure, Networking, Surveillance and more from TeamFrontline.',
            'keywords'    => ['ups', 'servers', 'networking', 'surveillance'],
        ],

        'about' => [
            'title'       => 'About TeamFrontline | Leading IT Solution Provider in Kerala',
            'description' => 'Established in 1996, TeamFrontline provides IT integration, power, networking, surveillance and data center solutions across Kerala.',
            'keywords'    => ['about teamfrontline', 'it integrator kerala', 'ups kerala'],
        ],

        'contact' => [
            'title'       => 'Contact TeamFrontline | Kochi, Trivandrum, Calicut Offices',
            'description' => 'Reach TeamFrontline for IT Solutions, UPS, Networking, Power Systems and Data Center services across Kerala.',
            'keywords'    => ['contact teamfrontline', 'it services kerala', 'ups kochi'],
        ],

        // ---------------- PRODUCT PAGES ----------------
        'products' => [
            'title'       => 'Products | TeamFrontline Kerala – UPS, Servers, Racks, Networking',
            'description' => 'Explore UPS, Batteries, Servers, Racks, Networking Devices, Firewalls, Storage and accessories from leading brands.',
            'keywords'    => [
                'ups', 'batteries', 'racks', 'server suppliers', 'networking devices kerala',
                'cisco kerala', 'dell servers'
            ],
        ],

        'products.show' => [
            'title'       => 'Product Details | TeamFrontline Kerala',
            'description' => 'Detailed information about our IT, power and networking products.',
            'keywords'    => ['product', 'it product', 'solutions'],
        ],

        // ---------------- CATEGORY PAGES ----------------
        'category.show' => [
            'title'       => 'Product Category | TeamFrontline Kerala',
            'description' => 'Browse products by category including UPS, Servers, Networking, Storage and more.',
            'keywords'    => ['product category', 'it category'],
        ],

        // ---------------- BLOG ----------------
        'blog' => [
            'title'       => 'Blog | TeamFrontline Kerala – Tech Updates & News',
            'description' => 'Read articles about IT solutions, UPS technology, networking and industry insights.',
            'keywords'    => ['blog', 'tech blog', 'teamfrontline articles'],
        ],

        'blog.show' => [
            'title'       => 'Blog Details | TeamFrontline',
            'description' => 'Read detailed tech guides and insights from TeamFrontline.',
            'keywords'    => ['blog details', 'tech article'],
        ],

        // ---------------- SOLUTIONS ----------------
        'solutions' => [
            'title'       => 'Solutions | TeamFrontline Kerala',
            'description' => 'Explore Power Solutions, Networking, Data Center, Surveillance and Cloud services.',
            'keywords'    => ['solutions', 'power solutions', 'networking', 'data center'],
        ],

        'solutions.show' => [
            'title'       => 'Solution | TeamFrontline',
            'description' => 'Learn more about our IT and power solutions.',
            'keywords'    => ['solution details', 'it solution'],
        ],

        // ---------------- SERVICES ----------------
        'services' => [
            'title'       => 'Services | TeamFrontline Kerala',
            'description' => 'Installation, Maintenance, AMC, FMS, and Support Services.',
            'keywords'    => ['services', 'amc', 'installation', 'fms'],
        ],

        'services.show' => [
            'title'       => 'Service | TeamFrontline',
            'description' => 'Learn more about our service offerings.',
            'keywords'    => ['service details', 'installation', 'support'],
        ],
    ];

    /**
     * Set SEO Tags
     */
    public function setSeoTags(string $page = 'default', array $overrides = [])
    {
        $data = $this->pages[$page] ?? $this->pages['default'];

        $title       = $overrides['title'] ?? $data['title'];
        $description = $overrides['description'] ?? $data['description'];

        $defaultKeywords  = $this->pages['default']['keywords'] ?? [];
        $pageKeywords     = $data['keywords'] ?? [];
        $overrideKeywords = $overrides['keywords'] ?? [];

        $keywords = array_unique(array_merge($defaultKeywords, $pageKeywords, $overrideKeywords));

        // META
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::addKeyword($keywords);
        SEOMeta::setCanonical(url()->current());

        // OPEN GRAPH
        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl(URL::current());

        // TWITTER
        Twitter::setTitle($title);
        Twitter::setDescription($description);

        // JSON-LD
        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::setType('WebPage');
        JsonLd::setUrl(URL::current());

        return $this;
    }

    /**
     * Add Breadcrumb Schema
     */
    public function addBreadcrumbSchema(array $items)
    {
        JsonLdMulti::setType('BreadcrumbList')
            ->addValue('itemListElement', $items);
    }
}
